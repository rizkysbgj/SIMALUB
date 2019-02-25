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
            $mstTugas->IDKategori = 0;
            $mstTugas->PIC = "Admin";
            $mstTugas->Status = "OK";
            
            $count = mstTugas::where('IDProyek', $mstTugas->IDProyek)->count()+1;
            
            $mstTugas->InisialTugas = $mstProyek->InisialProyek.'-'.(string)$count; 
            $mstTugas->CreatedBy = "Admin";
            $mstTugas->UpdatedBy = "Admin";

            $mstTugas->save();
            $mstTugas->ErrorType = 0;
            return response($mstTugas->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetTugas($IDTugas)
    {
        try {
            $mstTugas = mstTugas::where('IDTugas', $IDTugas)->firstorfail();
            return $mstTugas;
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
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
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function UpdateTugas(Request $request)
    {
        try {
            $mstTugas = mstTugas::where('IDTugas', $request->IDTugas)->firstorfail();
            $mstTugas->fill($request->all());
            $mstTugas->UpdatedBy = "Admin";
            $mstTugas = $this->ChangeDateFormat($mstTugas);
            $mstTugas->save();
            $mstTugas->ErrorType = 0;
            
            return $mstTugas;
            //return response($mstTugas->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetDetailTugas($IDTugas)
    {
        try
        {
            $tugas = vwTugas::where('IDTugas', $IDTugas)->firstorfail();
            $flow = mstmilestoneflowtugas::where('IDMilestoneTugas', $tugas->IDMilestone)->get();
            $model = new vmtugas();
            $model->tugas = $tugas;
            $model->flow = $flow;
            return $model;
        }
        catch (Exception $e)
        {
            return response()->json(['error' => $e->getMessage()]);
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
            $trxTugas->PIC = $request->PIC;
            $trxTugas->Catatan = $request->Remark;
            $trxTugas->IDMilestoneTugas = $IDMilestoneNext;
            $trxTugas->CreatedBy = "Admin";
            $trxTugas->UpdatedBy = "Admin";
            
            //ubah milestone
            if($request->Kode == "SELESAI")
            {
                

                $oldTrxTugas = trxTugas::where("IDTugas", $request->IDTugas)->where("IDMilestoneTugas", $IDMilestoneNow)->firstorfail();

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
            else
            {
                $count = trxTugas::where('IDTugas', $request->IDTugas)->where('IDMilestoneTugas', $IDMilestoneNext)->count();

                if($count>0 && $request->IDMilestoneTugas != 7)
                {
                    $oldTrxTugas = trxTugas::where('IDTugas', $request->IDTugas)->where('IDMilestoneTugas', $IDMilestoneNext)->firstorfail();
                    if($request->Kode == "MULAI")
                    {
                        $oldTrxTugas->WaktuMulai = Carbon::now()->toDateString();
                        $oldTrxTugas->save();
                    }

                    if($request->IDMilestoneTugas == 11)
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
        catch (Exception $e)
        {
            return $e->getMessage();
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
            $tugas->IDMilestone = $IDMilestoneTugas;
            $tugas->PIC = $PIC;
            $tugas->UpdatedBy = "Admin";
            
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
            return $e->getMessage();
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
