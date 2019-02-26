<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Exception;
use App\mstProyek;
use App\vwProyek;

class ProyekControllerApi extends Controller
{
    public function CreateProyek(Request $request)
    {
        try {
            if(mstProyek::where('NamaProyek', $request->NamaProyek)->orwhere('', $request->InisialProyek)->count()==0)
            {
                $mstProyek = new mstProyek();
                $mstProyek->fill($request->all());
                $mstProyek->CreatedBy = "Admin";
                $mstProyek = $this->ChangeDateFormat($mstProyek);
                $mstProyek->save();
                $mstProyek->ErrorType = 0;
            }
            else
            {
                $mstProyek->ErrorType = 1;
                $mstProyek->ErrorMessage = "Nama atau inisial proyek sudah ada!";
            }
            
            return response($mstProyek->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (\Exception $e) {
            $mstProyek->ErrorType = 2;
            $mstProyek->ErrorMessage = $e->getMessage();
            return response()->json($mstProyek->jsonSerialize());
        }
    }

    public function GetProyek($IDProyek)
    {
        try {
            $mstProyek = mstProyek::where('IDProyek', $IDProyek)->firstorfail();
            return $mstProyek;
        }
        catch (\Exception $e) {
            $mstProyek->ErrorType = 2;
            $mstProyek->ErrorMessage = $e->getMessage();
            return response()->json($mstProyek->jsonSerialize());
        }
    }

    public function GetListProyek()
    {
        try {
            return response(vwProyek::all()->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $mstProyek->ErrorType = 2;
            $mstProyek->ErrorMessage = $e->getMessage();
            return response()->json($mstProyek->jsonSerialize());
        }
    }

    public function UpdateProyek(Request $request)
    {
        try {
            $mstProyek = mstProyek::where('IDProyek', $request->IDProyek)->firstorfail();
            $mstProyek->fill($request->all());
            $mstProyek->UpdatedBy = "Admin";
            $mstProyek = $this->ChangeDateFormat($mstProyek);
            if(mstProyek::where('NamaProyek', $request->NamaProyek)->orwhere('InisialProyek', $request->InisialProyek)->count()>0)
            {
                $mstProyek->ErrorType = 1;
                $mstProyek->ErrorMessage = "Nama atau inisial proyek sudah ada!";
                return response($mstProyek->jsonSerialize());
            }
            $mstProyek->save();
            $mstProyek->ErrorType = 0;
            return response($mstProyek->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $mstProyek->ErrorType = 2;
            $mstProyek->ErrorMessage = $e->getMessage();
            return response()->json($mstProyek->jsonSerialize());
        }
    }

    public function DeleteProyek($IDProyek)
    {
        try
        {
            $proyek = mstProyek::where('IDProyek', $IDProyek)->firstorfail();
            $proyek->delete();
            $proyek->ErrorType = 0;
            return $proyek;
        }
        catch (\Exception $e)
        {
            $proyek->ErrorType = 2;
            $proyek->ErrorMessage = $e->getMessage(); 
            return $proyek;
        }
    }

    private function ChangeDateFormat($mstProyek)
    {
        $mstProyek->TanggalMulai = ($mstProyek->TanggalMulai != "") ? Carbon::parse($mstProyek->TanggalMulai)->format('Y-m-d') : $mstProyek->TanggalMulai;
        $mstProyek->RencanaSelesai = ($mstProyek->RencanaSelesai != "") ? Carbon::parse($mstProyek->RencanaSelesai)->format('Y-m-d') : $mstProyek->RencanaSelesai;
        $mstProyek->RealitaSelesai = ($mstProyek->RealitaSelesai != "") ? Carbon::parse($mstProyek->RealitaSelesai)->format('Y-m-d') : $mstProyek->RealitaSelesai;
        return $mstProyek;
    }
}
