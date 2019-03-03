<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use App\mstTugas;
use App\mstProyek;
use App\mstmilestoneflowtugas;
use App\viewmodel\vmtugas;
use App\trxTugasLog;
use App\vwTugas;
use App\trxTugas;
use App\trxLapor;
use App\vwTrxLaporan;
use App\trxKajiUlang;
use Auth;

class TugasControllerApi extends Controller
{
    public function CreateTugas(Request $request)
    {
        try {
            $mstTugas = new mstTugas();
            $mstTugas->fill($request->all());
            $mstTugas = $this->ChangeDateFormat($mstTugas);
            $mstProyek = mstProyek::where('IDProyek', $request->IDProyek)->firstorfail();
            // //set default value
            $mstTugas->Status = "OK";
            $mstTugas->IDPenanggungJawab = Auth::user()->IDUser;
            
            $count = mstTugas::where('IDProyek', $mstTugas->IDProyek)->count()+1;
            
            $mstTugas->InisialTugas = $mstProyek->InisialProyek.'-'.(string)$count; 
            $mstTugas->CreatedBy = Auth::user()->IDUser;
            $mstTugas->UpdatedBy = Auth::user()->IDUser;

            $mstTugas->save();
            $mstTugas->ErrorType = 0;
            return response($mstTugas->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (\Exception $e) {
            $tugas = new mstTugas();
            $tugas->ErrorType = 2;
            $tugas->ErrorMessage = $e->getMessage(); 
            return $tugas;
            // return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetTugas($IDTugas)
    {
        try {
            $mstTugas = mstTugas::where('IDTugas', $IDTugas)->firstorfail();
            return $mstTugas;
        }
        catch (\Exception $e) {
            $tugas->ErrorType = 2;
            $tugas->ErrorMessage = $e->getMessage(); 
            return $tugas;
            // return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetListTugas($IDProyek)
    {
        try {
            if($IDProyek != 0)
                $tugasList = vwTugas::where('IDProyek', $IDProyek)->get();
            else
                $tugasList = vwTugas::all();
            return $tugasList;
                //return response($mstTugasList->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $tugasList = new vwTugas();
            $tugasList->ErrorType = 2;
            $tugasList->ErrorMessage = $e->getMessage(); 
            return $tugasList;
            // return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetListDetailTugas($IDProyek)
    {
        try {
            if($IDProyek != 0)
                $tugasList = vwTugas::where('IDProyek', $IDProyek)->where('Status', '!=', 'Tidak')->orderBy('IDTugas', 'asc')->get();
            else
                $tugasList = vwTugas::where('Status', '!=', 'Tidak')->orderBy('IDTugas', 'asc')->get();
            return $tugasList;
                //return response($mstTugasList->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $tugasList = new vwTugas();
            $tugasList->ErrorType = 2;
            $tugasList->ErrorMessage = $e->getMessage(); 
            return $tugasList;
            // return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function UpdateTugas(Request $request)
    {
        try {
            $mstTugas = mstTugas::where('IDTugas', $request->IDTugas)->firstorfail();
            $mstTugas->fill($request->all());
            $mstTugas->UpdatedBy = Auth::user()->IDUser;
            $mstTugas = $this->ChangeDateFormat($mstTugas);
            $mstTugas->save();
            $mstTugas->ErrorType = 0;
            
            return $mstTugas;
            //return response($mstTugas->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $tugasList = new mstTugas();
            $tugasList->ErrorType = 2;
            $tugasList->ErrorMessage = $e->getMessage(); 
            return $tugasList;
            // return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetDetailTugas($IDTugas)
    {
        try
        {
            $tugas = vwTugas::where('IDTugas', $IDTugas)->firstorfail();
            $flow = mstmilestoneflowtugas::where('IDMilestoneTugas', $tugas->IDMilestoneTugas)->get();
            $model = new vmtugas();
            $model->tugas = $tugas;
            $model->flow = $flow;
            return $model;
        }
        catch (\Exception $e)
        {
            $model = new vmtugas();
            $model->ErrorType = 2;
            $model->ErrorMessage = $e->getMessage(); 
            return $model;
            // return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function DeleteTugas($IDTugas)
    {
        try
        {
            $tugas = mstTugas::where('IDTugas', $IDTugas)->firstorfail();
            $tugas->delete();
            $tugas->ErrorType = 0;
            return $tugas;
        }
        catch (\Exception $e)
        {
            $tugasList = new mstTugas();
            $tugasList->ErrorType = 2;
            $tugasList->ErrorMessage = $e->getMessage(); 
            return $tugasList;
        }
    }

    public function TugasTransaction(Request $request)
    {
        try
        {
            //declare
            $flow = new mstmilestoneflowtugas();
            $trxTugas = new trxTugas();

            //get flow milestone
            $flow = mstmilestoneflowtugas::where('IDMilestoneTugas', $request->IDMilestoneTugas)->where('Kode', $request->Kode)->firstorfail();
            
            //set current & next milestone
            $IDMilestoneNow = $request->IDMilestoneTugas;
            $IDMilestoneNext = $flow->IDMilestoneLanjut;

            //MilestoneAksi
            $MilestoneAksi = $flow->Aksi;

            //set value trxTugas
            $trxTugas->IDTugas = $request->IDTugas;
            $trxTugas->IDPenanggungJawab = $request->PIC;
            $trxTugas->Catatan = $request->Remark;
            $trxTugas->IDMilestoneTugas = $IDMilestoneNext;
            $trxTugas->CreatedBy = Auth::user()->IDUser;
            $trxTugas->UpdatedBy = Auth::user()->IDUser;
            
            //ubah milestone
            if($request->Kode == "SELESAI")
            {
                $oldTrxTugas = trxTugas::where("IDTugas", $request->IDTugas)->where("IDMilestoneTugas", $IDMilestoneNow)->orderBy('IDTrxTugas', 'desc')->firstorfail();

                $oldTrxTugas->Catatan = $request->Remark;
                
                if($request->hasFile('Attachment'))
                {
                    // if($Attachment->getCLientMimeType() == "")
                    $Attachment = $request->file('Attachment');
                    $oldTrxTugas->Attachment = $Attachment->store('public/files');
                    $oldTrxTugas->ContentType = $Attachment->getCLientMimeType();
                    $oldTrxTugas->FileName = $Attachment->getClientOriginalName();
                }
                $oldTrxTugas->WaktuSelesai = Carbon::now()->toDateString();
                $oldTrxTugas->save();
            }
            else
            {
                if($request->Kode == "SALAH")
                {
                    $IDMilestoneNext = $IDMilestoneNow;
                }

                $count = trxTugas::where('IDTugas', $request->IDTugas)->where('IDMilestoneTugas', $IDMilestoneNext)->count();

                if($count>0)
                {
                    $oldTrxTugas = trxTugas::where('IDTugas', $request->IDTugas)->where('IDMilestoneTugas', $IDMilestoneNext)->orderBy('IDTrxTugas', 'desc')->firstorfail();
                    if($request->Kode == "MULAI")
                    {
                        $oldTrxTugas->WaktuMulai = Carbon::now()->toDateString();
                        $oldTrxTugas->save();
                    }
                    else if($request->Kode == "SALAH")
                    {
                        $IDMilestoneNext = $flow->IDMilestoneLanjut;

                        $oldTrxTugas->Catatan = $request->Remark;
                        
                        if($request->hasFile('Attachment'))
                        {
                            $Attachment = $request->file('Attachment');
                            $oldTrxTugas->Attachment = $Attachment->store('public/files');
                            $oldTrxTugas->ContentType = $Attachment->getCLientMimeType();
                            $oldTrxTugas->FileName = $Attachment->getClientOriginalName();
                        }
                        $oldTrxTugas->WaktuSelesai = Carbon::now()->toDateString();
                        $oldTrxTugas->save();
                    }
                    
                    if($request->IDMilestoneTugas == 8)
                    {
                        $flow = mstmilestoneflowtugas::where('IDMilestoneTugas', $flow->IDMilestoneLanjut)->firstorfail();
                        $trxTugas->IDMilestoneTugas = $flow->IDMilestoneLanjut;
                        $trxTugas->save();
                    }
                }
                else
                {
                    if($request->Kode == "PILIH")
                    {
                        $flow = mstmilestoneflowtugas::where('IDMilestoneTugas', $flow->IDMilestoneLanjut)->firstorfail();
                        $trxTugas->IDMilestoneTugas = $flow->IDMilestoneLanjut;
                    }
                    else if($request->Kode == "MULAI")
                    {
                        $trxTugas->WaktuMulai = Carbon::now()->toDateString();
                    }
                    $trxTugas->save();
                }
                
            }

            $this->AddTransaction($request->IDTugas, $IDMilestoneNext, $MilestoneAksi, $request->IDUser, $request->PIC);

            $trxTugas->IDProyek = $request->IDProyek;
            $trxTugas->ErrorType = 0;
            return response($trxTugas->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e)
        {
            $trxTugas = new trxTugas();
            $trxTugas->ErrorType = 2;
            $trxTugas->ErrorMessage = $e->getMessage(); 
            return $trxTugas;
            // return $e->getMessage();
        }
    }

    public function CreateLaporTugas(Request $request)
    {
        try
        {
            $trxLapor = new trxLapor();
            $trxLapor->IDTugas = $request->IDTugas;
            $trxLapor->IDProyek = $request->IDProyek;
            if($request->hasFile('Attachment'))
                    {
                        $Attachment = $request->file('Attachment');
                        $trxLapor->Attachment = $Attachment->store('public/files');
                        $trxLapor->ContentType = $Attachment->getCLientMimeType();
                        $trxLapor->NamaFile = $Attachment->getClientOriginalName();
                    }
            $trxLapor->Catatan = $request->Remark;
            $trxLapor->IDPelapor = Auth::user()->IDUser;
            $trxLapor->save();
            $trxLapor->ErrorType = 0;
            return $trxLapor;
        }
        catch (\Exception $e)
        {
            $trxLapor = new trxLapor();
            $trxLapor->ErrorType = 2;
            $trxLapor->ErrorMessage = $e->getMessage();
            return $trxLapor;
        }
    }

    public function GetListTrxLaporanTugas($IDProyek)
    {
        try
        {
            $trxLaporanList = vwTrxLaporan::where('IDProyek', $IDProyek)->get();

            $trxLaporanList->ErrorType = 0;
            return $trxLaporanList;
        }
        catch(\Exception $e)
        {
            $trxLaporanList = new vwTrxLaporan();  
            $trxLaporanList->ErrorType = 2;
            $trxLaporanList->ErrorMessage = $e->getMessage();
            return $trxLaporanList;
        }
    }

    public function GetDetailTrxLaporanTugas($IDTrxLapor)
    {
        try
        {
            $trxLaporanList = new vwTrxLaporan();
            $trxLaporanList = vwTrxLaporan::where('IDTrxLapor', $IDTrxLapor)->firstorfail();

            $trxLaporanList->ErrorType = 0;
            return $trxLaporanList;
        }
        catch(\Exception $e)
        {
            $trxLaporanList = new vwTrxLaporan();
            $trxLaporanList->ErrorType = 2;
            $trxLaporanList->ErrorMessage = $e->getMessage();
            return $trxLaporanList;
        }
    }

    public function DeleteLaporan($IDTrxLapor)
    {
        try
        {
            $laporan = trxLapor::where('IDTrxLapor', $IDTrxLapor)->firstorfail();
            $laporan->delete();
            $laporan->ErrorType = 0;
            return $laporan;
        }
        catch (\Exception $e)
        {
            $laporan = new trxLapor();
            $laporan->ErrorType = 2;
            $laporan->ErrorMessage = $e->getMessage(); 
            return $laporan;
        }
    }

    public function KajiUlang(Request $request)
    {
        try
        {
            $kajiulang = new trxKajiUlang();
            $tugas = mstTugas::where('IDTugas', $request->IDTugas)->firstorfail();

            //set value to kajiulang
            $kajiulang->IDTugas = $request->IDTugas;
            $kajiulang->Metode = $request->Metode;
            $kajiulang->Peralatan = $request->Peralatan;
            $kajiulang->Personil = $request->Personil;
            $kajiulang->BahanKimia = $request->BahanKimia;
            $kajiulang->KondisiAkomodasi = $request->KondisiAkomodasi;
            if($kajiulang->Metode == "Tidak" || $kajiulang->Peralatan == "Tidak" || $kajiulang->Personil == "Tidak" || $kajiulang->BahanKimia == "Tidak" || $kajiulang->KondisiAkomodasi == "Tidak")
            {
                $kajiulang->Kesimpulan = "Tidak";
                $tugas->Status = "Tidak";
            }
            else
            {
                $kajiulang->Kesimpulan = "Bisa";
                $tugas->Status = "Bisa";
            }
            $kajiulang->save();
            $tugas->save();

            $kajiulang->ErrorType = 0;
            return $kajiulang;
        }
        catch(\Exception $e)
        {
            $kajiulang = new trxKajiUlang();
            $kajiulang->ErrorType = 2;
            $kajiulang->ErrorMessage = $e->getErrorMessage();
            return $kajiulang;
        }
    }

    public function GetListKajiUlang($IDProyek)
    {
        try {
            if($IDProyek != 0)
                $tugasList = vwTugas::where('IDProyek', $IDProyek)->where('Status', "Tidak")->get();
            else
                $tugasList = vwTugas::where('Status', "Tidak")->get();
            return $tugasList;
                //return response($mstTugasList->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            $kajiulang = new trxKajiUlang();
            $kajiulang->ErrorType = 2;
            $kajiulang->ErrorMessage = $e->getErrorMessage();
            return $kajiulang;
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function DeleteKajiUlang($IDTrxKajiUlang)
    {
        try
        {
            $kajiulang = trxKajiUlang::where('IDTrxKajiUlang', $IDTrxKajiUlang)->firstorfail();
            $kajiulang->delete();
            $kajiulang->ErrorType = 0;
            return $kajiulang;
        }
        catch (\Exception $e)
        {
            $kajiulang = new trxKajiUlang();
            $kajiulang->ErrorType = 2;
            $kajiulang->ErrorMessage = $e->getMessage(); 
            return $kajiulang;
        }
    }

    private function AddTransaction($IDTugas, $IDMilestoneTugas, $MilestoneAksi, $IDUser, $PIC)
    {
        try
        {
            //create trxTugasLog
            // $this->CreateTrxLog($IDTugas, $MilestoneAksi, $IDUser);

            //Update mstTugas
            $tugas = new mstTugas();
            $tugas = mstTugas::where('IDTugas', $IDTugas)->firstorfail();
            $tugas->IDMilestoneTugas = $IDMilestoneTugas;
            $tugas->IDPenanggungJawab = $PIC;
            $tugas->UpdatedBy = Auth::user()->IDUser;
            
            if($IDMilestoneTugas == 2)
            {
                $tugas->RealitaMulai = Carbon::now()->toDateString();
            }
            else if($IDMilestoneTugas == 11)
            {
                $tugas->RealitaSelesai = Carbon::now()->toDateString();
            }
            $tugas->save();
            return "Sukses";

        }
        catch (\Exception $e)
        {
            $tugas = new mstTugas();
            $tugas->ErrorType = 2;
            $tugas->ErrorMessage = $e->getMessage();
            return $tugas;
            // return $e->getMessage();
        }
    }

    private function CreateTrxLog($IDTugas, $MilestoneAksi, $IDUser)
    {
        $trxTaskLog = new trxTugasLog();
        try
        {
            $trxTaskLog->IDTugas = $IDTugas;
            $trxTaskLog->Milestone = $MilestoneAksi;
            $trxTaskLog->IDUser = $IDUser;

            $trxTaskLog->save();
            return "Sukses";
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    private function ChangeDateFormat($mstTugas)
    {
        $mstTugas->RencanaMulai = ($mstTugas->RencanaMulai != "") ? Carbon::parse($mstTugas->RencanaMulai)->format('Y-m-d') : $mstTugas->RencanaMulai;
        $mstTugas->RencanaSelesai = ($mstTugas->RencanaSelesai != "") ? Carbon::parse($mstTugas->RencanaSelesai)->format('Y-m-d') : $mstTugas->RencanaSelesai;
        $mstTugas->RealitaMulai = ($mstTugas->RealitaMulai != "") ? Carbon::parse($mstTugas->RealitaMulai)->format('Y-m-d') : $mstTugas->RealitaMulai;
        $mstTugas->RealitaSelesai = ($mstTugas->RealitaSelesai != "") ? Carbon::parse($mstTugas->RealitaSelesai)->format('Y-m-d') : $mstTugas->RealitaSelesai;
        return $mstTugas;
    }

    private function AttachmentUpload($Attachment) 
    {
        return true;
    }
}
