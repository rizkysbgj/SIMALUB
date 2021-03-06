<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use App\model\mstTugas;
use App\model\mstProyek;
use App\model\mstmilestoneflowtugas;
use App\viewmodel\vmtugas;
use App\model\trxTugasLog;
use App\model\vwTugas;
use App\model\trxTugas;
use App\model\trxLapor;
use App\model\vwTrxLaporan;
use App\model\trxKajiUlang;
use App\viewmodel\vmTugasAdministrasi;
use App\model\vwTrxTugas;
use App\model\vwProyek;
use App\model\mstSertifikat;
use App\model\mstSubKontrak;
use App\model\mstNotifikasi;
use App\model\mstUser;
use Auth;
use Storage;
use App\Http\Controllers\HelpersController;
use App\Http\Controllers\ControllersApi\IntegrasiApi;

class TugasControllerApi extends Controller
{
    #region Tugas
    public function CreateTugas(Request $request)
    {
        try {
            $mstTugas = new mstTugas();
            $mstTugas->fill($request->all());
            $mstTugas = $this->ChangeDateFormat($mstTugas);
            $mstProyek = mstProyek::where('IDProyek', $request->IDProyek)->firstorfail();
            // //set default value
            $mstTugas->StatusKajiUlang = "SIAP";
            $mstTugas->IDPenanggungJawab = Auth::user()->IDUser;
            
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
    
    //Fungsi create tugas baru
    public function IntegrasiTugas($tugas, $IDProyek, $RencanaMulai)
    {
        try {
            $defaultPenanggungJawab = mstUser::where('IDRole', 3)->first();
            $mstTugas = new mstTugas();
            // $mstTugas->fill($request->all());
            $mstTugas->NamaTugas = $tugas['NamaTugas'];
            $mstTugas->InisialTugas = $tugas['InisialTugas'];
            // $mstTugas->DeskripsiTugas = $tugas['DeskripsiTugas'];
            $mstTugas->IDProyek = $IDProyek;
            $mstTugas->IDMilestoneTugas = 1;
            $mstTugas->RencanaMulai = Carbon::now()->toDateString();
            $mstTugas->RencanaSelesai = $RencanaMulai;

            // $mstTugas->RencanaMulai = Carbon::now()->toDateString();
            // $mstTugas->RencanaSelesai = Carbon::now()->toDateString();

            // $mstTugas = $this->ChangeDateFormat($mstTugas);
            
            // set default value
            $mstTugas->StatusKajiUlang = "SIAP";
            $mstTugas->IDPenanggungJawab = $defaultPenanggungJawab->IDUser;
            $mstTugas->DeskripsiTugas = "";
            
            $mstTugas->CreatedBy = "Administrasi";
            $mstTugas->UpdatedBy = "Administrasi";

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

    //Fungsi read tugas by IDTugas
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

    //Fungsi read tugas list by IDProyek
    public function GetListTugas($IDProyek)
    {
        try {
            if($IDProyek != 0)
                $tugasList = vwTugas::where('IDProyek', $IDProyek)->orderBy('IDTugas', 'asc')->get();
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

    //Fungsi read detail tugas list by IDProyek
    public function GetListDetailTugas($IDProyek)
    {
        try {
            if($IDProyek != 0)
                $tugasList = vwTugas::where('IDProyek', $IDProyek)->where('StatusKajiUlang', '!=', 'Tidak')->orderBy('IDTugas', 'asc')->get();
            else
                $tugasList = vwTugas::where('StatusKajiUlang', '!=', 'Tidak')->orderBy('IDTugas', 'asc')->get();
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

    //Fungsi update tugas
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

    //Fungsi read detail tugas by IDTugas
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

    //Fungsi delete tugas by IDTugas
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

    //Fungsi read tugas by Auth::user()->IDUser
    public function GetTugasSaya()
    {
        try {
            $tugasList = vwTugas::where('IDPenanggungJawab', Auth::user()->IDUser)->where('StatusKajiUlang', '!=', 'Tidak')->get();
            $tugasList->ErrorType = 0;
            return $tugasList;
        }
        catch (\Exception $e) {
            $tugasList = new vwTugas();
            $tugasList->ErrorType = 2;
            $tugasList->ErrorMessage = $e->getMessage(); 
            return $tugasList;
            // return response()->json(['error' => $e->getMessage()]);
        }
    }
    #endregion

    #region Transaksi Tugas
    //Fungsi flow tugas
    public function TugasTransaction(Request $request)
    {
        try
        {
            $helper = new HelpersController();
            //declare
            $flow = new mstmilestoneflowtugas();
            $trxTugas = new trxTugas();

            //get flow milestone
            if($request->IDMilestoneTugas != 9)
                $flow = mstmilestoneflowtugas::where('IDMilestoneTugas', $request->IDMilestoneTugas)->where('Kode', $request->Kode)->firstorfail();
            else
            $flow = mstmilestoneflowtugas::where('IDMilestoneTugas', $request->IDMilestoneTugas)->firstorfail();
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
            
            //tugas selesai, serahkan ke administrasi
            if($IDMilestoneNow == 9)
            {
                $this->AddTransaction($request->IDTugas, $IDMilestoneNext, $MilestoneAksi, $request->IDUser, $request->PIC);
                $trxTugas->ErrorType = 0;
                $trxTugas->IDProyek = $request->IDProyek;
                return $trxTugas;
            }


            if($request->Kode == "SELESAI") 
            {
                $oldTrxTugas = trxTugas::where("IDTugas", $request->IDTugas)->where("IDMilestoneTugas", $IDMilestoneNow)->orderBy('IDTrxTugas', 'desc')->firstorfail();

                if($IDMilestoneNow == 8)
                {
                    $oldTrxTugas->StatusTugas = "SELESAI";
                }

                $oldTrxTugas->Catatan = $request->Remark;
                
                if($request->hasFile('Attachment'))
                {
                    // if($Attachment->getCLientMimeType() == "")
                    $Attachment = $request->file('Attachment');
                    if($helper->cekFiles($Attachment))
                    {
                        $oldTrxTugas->Attachment = $Attachment->store('public/files');
                        $oldTrxTugas->ContentType = $Attachment->getCLientMimeType();
                        $oldTrxTugas->FileName = $Attachment->getClientOriginalName();
                    }
                    else
                    {
                        $trxTugas = new trxTugas();
                        $trxTugas->ErrorType = 2;
                        $trxTugas->ErrorMessage = "Format File Tidak Valid"; 
                        return $trxTugas;
                    }
                }
                $oldTrxTugas->WaktuSelesai = Carbon::now()->toDateString();
                $oldTrxTugas->save();
            }
            else
            {
                if($request->Kode == "SALAH") 
                {
                    $IDMilestoneNext = $IDMilestoneNow;
                    $trxTugas->Catatan = "";
                    $countAnalisis = trxTugas::where('IDTugas', $request->IDTugas)->where('IDMilestoneTugas', 5)->count();
                    $trxTugas->StatusTugas = "Ulangan ke-" . $countAnalisis;
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
                            if($helper->cekFiles($Attachment))
                            {
                                $oldTrxTugas->Attachment = $Attachment->store('public/files');
                                $oldTrxTugas->ContentType = $Attachment->getCLientMimeType();
                                $oldTrxTugas->FileName = $Attachment->getClientOriginalName();
                            }
                            else
                            {
                                $trxTugas = new trxTugas();
                                $trxTugas->ErrorType = 2;
                                $trxTugas->ErrorMessage = "Format File Tidak Valid"; 
                                return $trxTugas;
                            }
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
                        $count = trxTugas::where('IDTugas', $request->IDTugas)->where('IDMilestoneTugas', $flow->IDMilestoneLanjut)->count();
                        if($count > 0)
                        {
                            $trxTugas->StatusTugas = "Ulangan ke-" . $count;
                        }
                        $trxTugas->IDMilestoneTugas = $flow->IDMilestoneLanjut;
                        
                        //Kirim Notifikasi
                        $IDUser = $request->PIC;
                        $pesan = "Anda menerima tugas baru";
                        $aksi = "/halamanTugasSaya";
                        $notifikasi = $this->KirimNotifikasi($IDUser, $pesan, $aksi);
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

    //Fungsi read list tugas untuk administrasi by IDProyek
    public function AdministrasiGetListTugas($IDProyek)
    {
        try
        {   
            $listTugas = vwTugas::where('IDProyek', $IDProyek)->where('IDMilestoneTugas', '10')->get();
            if($listTugas->count() > 0)
            {
                $flag = 'ok';
            }
            else
            {
                $flag = 'not';
            }
            $vwTugas = vwProyek::where('IDProyek', $IDProyek)->firstorfail();
            $tugasAdministrasi = new vmTugasAdministrasi();
            $tugasAdministrasi->listTugas = $listTugas;
            $tugasAdministrasi->detailProyek = $vwTugas;
            $tugasAdministrasi->flag = $flag;
            $tugasAdministrasi->ErrorType = 0;
            return $tugasAdministrasi;
        }
        catch (\Exception $e)
        {
            $tugasAdministrasi = new vmTugasAdministrasi();
            $tugasAdministrasi->ErrorType = 0;
            $tugasAdministrasi->ErrorMessage = $e->getMessage();
            return $tugasAdministrasi;
        }
    }

    //Fungsi multiple flow tugas untuk administrasi by IDProyek
    public function AdministrasiTransaction(Request $request)
    {
        try
        {
            $proyek = mstProyek::where('IDProyek', $request->IDProyek)->firstorfail();
            if($proyek->SiapBuatSertifikat == '1')
            {
                $proyek->SiapBuatSertifikat = '2';
                $proyek->save();
                $proyek->ErrorType = 0;
                return $proyek;
            }
            else if($proyek->SiapBuatSertifikat == '2')
            {
                $proyek->SiapBuatSertifikat = '3';
                $proyek->RealitaSelesai = Carbon::now()->toDateString();

                $IntegrasiApi = new IntegrasiApi();
                $result = $IntegrasiApi->SendTrackingStatus($proyek->IDProyek, '3');   
            }
            $flow = new mstmilestoneflowtugas();
            $flow = mstmilestoneflowtugas::where('IDMilestoneTugas', 10)->firstorfail();
            $IDMilestoneNext = $flow->IDMilestoneLanjut;

            $updateValue = array('IDMilestoneTugas' => $IDMilestoneNext, 'RealitaSelesai' => Carbon::now()->toDateString());

            // $listTugas->IDMilestoneTugas = $IDMilestoneNext;
            // $listTugas->RealitaSelesai = Carbon::now()->toDateString();

            //upload sertifikat
            $sertifikat = new mstSertifikat();
            $sertifikat->IDProyek = $request->IDProyek;
            $sertifikat->Catatan = $request->Remark;
            if($request->hasFile('Attachment'))
            {
                $Attachment = $request->file('Attachment');
                $helper = new HelpersController();
                if($helper->cekFiles($Attachment))
                {
                    $filename = $Attachment->getClientOriginalName().'.'.$Attachment->getClientOriginalName();
                    $sertifikat->Attachment = $Attachment->storeAs('public/sertifikat', $filename);
                    $sertifikat->ContentType = $Attachment->getCLientMimeType();
                    $sertifikat->NamaFile = $Attachment->getClientOriginalName();
                }
                else
                {
                    $sertifikat->ErrorType = 2;
                    $sertifikat->ErrorMessage = "Format File Tidak Valid"; 
                    return $sertifikat;
                }
            }

            $sertifikat->save();
            $listTugas = mstTugas::where('IDProyek', $request->IDProyek)->update($updateValue);
            $proyek->save();
            // $listTugas->save();
            $proyek->ErrorType = 0;
            return $proyek;
        }
        catch (\Exception $e)
        {
            $listTugas = new mstTugas();
            $listTugas->ErrorType = 2;
            $listTugas->ErrorMessage = $e->getMessage();
            return $listTugas;
        }
    }

    //Fungsi read trx tugas list untuk administrasi by IDProyek
    public function AdministrasiGetListTrxTugas($IDProyek)
    {
        try
        {
            $listTrxTugas = vwTrxTugas::where('IDProyek', $IDProyek)->where('IDMilestoneTugas', "8")->where('StatusTugas', 'SELESAI')->orderBy('IDTrxTugas', 'asc')->get();
            $listTrxTugas->ErrorType = 0;
            return $listTrxTugas;
        }
        catch (\Exception $e)
        {
            $listTrxTugas = new vwTrxTugas();
            $listTrxTugas->ErrorType = 0;
            $listTrxTugas->ErrorMessage = $e->getMessage();
            return $listTrxTugas;
        }
    }

    //Fungsi download attachment by IDTrxTugas
    public function DownloadAttachment($IDTrxTugas)
    {
        try
        {
            $trxTugas = trxTugas::where('IDTrxTugas', $IDTrxTugas)->firstorfail();
            return Storage::download($trxTugas->Attachment, $trxTugas->FileName);
        }
        catch(\Exception $e)
        {
            $trxTugas = new trxTugas();
            $trxTugas->ErrorType = 2;
            $trxTugas->ErrorMessage = $e->getMessage();
            return $trxTugas;
        }
    }

    //Fungsi read trx tugas list by IDTugas
    public function GetListTrxTugas($IDTugas)
    {
        try
        {
            $listTrxTugas = vwTrxTugas::where('IDTugas', $IDTugas)->orderBy('IDTrxTugas', 'asc')->get();
            $listTrxTugas->ErrorType = 0;
            return $listTrxTugas;
        }
        catch (\Exception $e)
        {
            $listTrxTugas = new vwTrxTugas();
            $listTrxTugas->ErrorType = 0;
            $listTrxTugas->ErrorMessage = $e->getMessage();
            return $listTrxTugas;
        }
    }
    #endregion

    #region Lapor Tugas
    //Fungsi create laporan kendala tugas
    public function CreateLaporTugas(Request $request)
    {
        try
        {
            $trxLapor = new trxLapor();
            $trxLapor->IDTugas = $request->IDTugas;
            $trxLapor->IDProyek = $request->IDProyek;
            if($request->hasFile('Attachment'))
            {
                $helper = new HelpersController();
                $Attachment = $request->file('Attachment');
                if($helper->cekFiles($Attachment))
                {
                    $trxLapor->Attachment = $Attachment->store('public/files');
                    $trxLapor->ContentType = $Attachment->getCLientMimeType();
                    $trxLapor->NamaFile = $Attachment->getClientOriginalName();
                }
                else
                {
                    $trxTugas = new trxTugas();
                    $trxTugas->ErrorType = 2;
                    $trxTugas->ErrorMessage = "Format File Tidak Valid"; 
                    return $trxTugas;
                }
            }
            $trxLapor->Catatan = $request->Remark;
            $trxLapor->IDPelapor = Auth::user()->IDUser;
            $trxLapor->save();

            //Kirim Notifikasi
            $proyek = mstProyek::where('IDProyek',  $request->IDProyek)->firstorfail();
            $IDUser = "ManajerTeknis";
            $pesan = "Anda menerima laporan baru pada proyek " . $proyek->NamaProyek;
            $aksi = "/halamanLaporan";
            $notifikasi = $this->KirimNotifikasi($IDUser, $pesan, $aksi);

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

    public function GetTotalLaporan()
    {
        try
        {
            $laporan = new trxLapor();
            $laporan->totalLaporan = trxLapor::where('StatusTindakan', 0)->count();

            $laporan->ErrorType = 0;
            return $laporan;
        }
        catch(\Exception $e)
        {
            $totalLaporan = new trxLapor();
            $totalLaporan->ErrorType = 2;
            $totalLaporan->ErrorMessage = $e->getMessage();
            return $totalLaporan;
        }
    }

    //Fungsi read trx laporan kendala tugas by IDProyek
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

    //Fungsi read detail trx laporan kendala tugas by IDTrxLapor
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

    //Fungsi delete laporan kendala tugas by IDTrxLapor
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

    public function TindakLaporan(Request $request)
    {
        try
        {
            $laporan = new trxLapor();
            $laporan = trxLapor::where('IDTrxLapor', $request->IDTrxLapor)->firstorfail();

            if($request->hasFile('Attachment'))
            {
                $Attachment = $request->file('Attachment');
                $helper = new HelpersController();
                if($helper->cekFiles($Attachment))
                {
                    $laporan->AttachmentTindakan = $Attachment->store('public/files');
                    $laporan->ContentTypeTindakan = $Attachment->getCLientMimeType();
                    $laporan->NamaFileTindakan = $Attachment->getClientOriginalName();
                }
                else
                {
                    $laporan = new trxTugas();
                    $laporan->ErrorType = 2;
                    $laporan->ErrorMessage = "Format File Tidak Valid"; 
                    return $laporan;
                }
            }

            $laporan->StatusTindakan = 1;
            $laporan->CatatanTindakan = $request->Catatan;

            $laporan->save();
            $laporan->ErrorType = 0;
            return $laporan;
        }
        catch(\Exception $e)
        {
            $laporan = new trxLapor();
            $laporan->ErrorType = 2;
            $laporan->ErrorMessage = $e->getMessage();
            return $laporan;
        }
    }

    public function DownloadAttachmentLaporan($IDTrxLapor)
    {
        try
        {
            $laporan = trxLapor::where('IDTrxLapor', $IDTrxLapor)->firstorfail();
            return Storage::download($laporan->Attachment, $laporan->NamaFile);
        }
        catch(\Exception $e)
        {
            $laporan = new trxLapor();
            $laporan->ErrorType = 2;
            $laporan->ErrorMessage = $e->getMessage();
            return $laporan;
        }
    }

    public function DownloadAttachmentTindakan($IDTrxLapor)
    {
        try
        {
            $tindakan = trxLapor::where('IDTrxLapor', $IDTrxLapor)->firstorfail();
            return Storage::download($tindakan->AttachmentTindakan, $tindakan->NamaFileTindakan);
        }
        catch(\Exception $e)
        {
            $tindakan = new trxLapor();
            $tindakan->ErrorType = 2;
            $tindakan->ErrorMessage = $e->getMessage();
            return $tindakan;
        }
    }
    #endregion

    #region Kaji Ulang
    //Fungsi create kaji ulang
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
                $tugas->StatusKajiUlang = "Tidak";

                $subkontrak = new mstSubKontrak();
                $subkontrak->IDTugas = $request->IDTugas;
                $subkontrak->WaktuDikirim = Carbon::now()->toDateString();
                $subkontrak->IDPenanggungJawab = Auth::user()->IDUser;
                $subkontrak->CreatedBy = Auth::user()->IDUser;
                $subkontrak->save();
            }
            else
            {
                $kajiulang->Kesimpulan = "Bisa";
                $tugas->StatusKajiUlang = "Bisa";
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

    //Fungsi read kaji ulang list by IDProyek
    public function GetListKajiUlang($IDProyek)
    {
        try {
            if($IDProyek != 0)
                $tugasList = vwTugas::where('IDProyek', $IDProyek)->where('StatusKajiUlang', "Tidak")->get();
            else
                $tugasList = vwTugas::where('StatusKajiUlang', "Tidak")->get();
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

    //Fungsi delete kaji ulang by IDTrxKajiUlang
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
    #endregion

    #region private
    //Fungsi update milestone tugas
    private function AddTransaction($IDTugas, $IDMilestoneTugas, $MilestoneAksi, $IDUser, $PIC)
    {
        try
        {
            //create trxTugasLog
            // $this->CreateTrxLog($IDTugas, $MilestoneAksi, $IDUser);

            //Update mstTugas
            $IntegrasiApi = new IntegrasiApi();
                
            $tugas = new mstTugas();
            $tugas = mstTugas::where('IDTugas', $IDTugas)->firstorfail();
            $tugas->IDMilestoneTugas = $IDMilestoneTugas;
            $tugas->IDPenanggungJawab = $PIC;
            $tugas->UpdatedBy = Auth::user()->IDUser;
            
            if($IDMilestoneTugas == 2)
            {
                $tugas->RealitaMulai = Carbon::now()->toDateString();
                
                $result = $IntegrasiApi->SendTrackingStatus($tugas->IDProyek, '1');
            }
            else if($IDMilestoneTugas == 5)
            {
                $result = $IntegrasiApi->SendTrackingStatus($tugas->IDProyek, '2');
            }
            else if($IDMilestoneTugas == 10)
            {
                $tugas->RealitaSelesai = Carbon::now()->toDateString();
                $proyek = mstProyek::where('IDProyek', $tugas->IDProyek)->firstorfail();
                if($proyek->SiapBuatSertifikat == null)
                {
                    $proyek->SiapBuatSertifikat = 1;
                    $proyek->save();
                }
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

    //Fungsi create trx tugas log
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

    //Fungsi merubah format tanggal
    private function ChangeDateFormat($mstTugas)
    {
        $mstTugas->RencanaMulai = ($mstTugas->RencanaMulai != "") ? Carbon::parse($mstTugas->RencanaMulai)->format('Y-m-d') : $mstTugas->RencanaMulai;
        $mstTugas->RencanaSelesai = ($mstTugas->RencanaSelesai != "") ? Carbon::parse($mstTugas->RencanaSelesai)->format('Y-m-d') : $mstTugas->RencanaSelesai;
        $mstTugas->RealitaMulai = ($mstTugas->RealitaMulai != "") ? Carbon::parse($mstTugas->RealitaMulai)->format('Y-m-d') : $mstTugas->RealitaMulai;
        $mstTugas->RealitaSelesai = ($mstTugas->RealitaSelesai != "") ? Carbon::parse($mstTugas->RealitaSelesai)->format('Y-m-d') : $mstTugas->RealitaSelesai;
        return $mstTugas;
    }

    //Fungsi upload file
    private function AttachmentUpload($Attachment) 
    {
        return true;
    }

    private function KirimNotifikasi($IDUser, $pesan, $aksi)
    {
        try
        {
            $notifikasi = new mstNotifikasi();
            $notifikasi->IDUser = $IDUser;
            $notifikasi->Pesan = $pesan;
            $notifikasi->Aksi = $aksi;
            $notifikasi->Dibaca = false;

            $notifikasi->save();
            return "sukses";
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
    #endregion
}
