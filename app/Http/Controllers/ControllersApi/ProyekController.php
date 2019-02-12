<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Exception;
use App\mstProyek;
use App\vwProyek;

class ProyekController extends Controller
{
    public function CreateProyek(Request $request)
    {
        try {
            $mstProyek = new mstProyek();
            $mstProyek->fill($request->all());
            $mstProyek->CreatedBy = "Admin";
            $mstProyek = $this->ChangeDateFormat($mstProyek);
            $mstProyek->save();
            $mstProyek->ErrorType = 0;
            return response($mstProyek->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetProyek($IDProyek)
    {
        try {
            $mstProyek = mstProyek::where('IDProyek', $IDProyek)->firstorfail();
            return $mstProyek;
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetListProyek()
    {
        try {
            return response(vwProyek::all()->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function UpdateProyek(Request $request)
    {
        try {
            $mstProyek = mstProyek::where('IDProyek', $request->IDProyek)->firstorfail();
            $mstProyek->fill($request->all());
            $mstProyek->UpdatedBy = "Admin";
            $mstProyek = $this->ChangeDateFormat($mstProyek);
            $mstProyek->save();
            $mstProyek->ErrorType = 0;
            return response($mstProyek->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
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
