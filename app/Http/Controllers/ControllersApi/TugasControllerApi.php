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
use App\trxTaskLog;


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
                $mstTugasList = mstTugas::where('IDProyek', $IDProyek)->get();
            else
                $mstTugasList = mstTugas::all();
            return response($mstTugasList->jsonSerialize(), Response::HTTP_OK);
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
            $tugas = mstTugas::where('IDTugas', $IDTugas)->firstorfail();
            $flow = mstmilestoneflowtugas::where('IDMilestoneTugas', $tugas->IDMilestone)->firstorfail();
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

    private function AddTransaction($IDTugas, $IDMilestoneTugas, $MilestoneAksi, $IDUser, $PIC)
    {
        try
        {
            //create trxTugasLog
            $this->CreateTrxLog($IDTugas, $MilestoneAksi, $IDUser);

            //Update mstTugas
            $tugas = new mstTugas();
            $tugas = mstTugas::where('IDTugas', $IDTugas)->firstorfail();
            $tugas->IDMilestone = $IDMilestoneTugas;
            $tugas->PIC = $PIC;
            $tugas->UpdatedBy = $IDUser;
            
            /*tanggal mulai&selesai
            ------
            ------
            */

            $task->save();
            return "Sukses";

        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    private function CreateTrxLog($IDTugas, $MilestoneAksi, $IDUser)
    {
        $trxTaskLog = new trxTaskLog();
        try
        {
            $trxTaskLog->IDTugas = $IDTugas;
            $trxTaskLog->Milestone = $MilestoneAksi;
            $trxTaskLog->IDUser = $IDUser;

            $trxTaskLog->save();
            return "Sukses";
        }
        catch (Exception $e)
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
}
