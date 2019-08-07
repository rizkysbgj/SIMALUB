<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Exception;
use App\model\mstProyek;
use App\model\mstUser;
use App\model\vwProyek;
use App\model\mstUlasan;
use App\model\vwUlasan;
use Auth;

class ProyekControllerApi extends Controller
{
    public function CreateProyek(Request $request)
    {
        try {
            if(mstProyek::where('NamaProyek', $request->NamaProyek)->where('IDProyek', '!=', $request->IDProyek)->count()==0)
            {
                $mstProyek = new mstProyek();
                $mstProyek->fill($request->all());
                $mstProyek->CreatedBy = Auth::user()->IDUser;
                $mstProyek = $this->ChangeDateFormat($mstProyek);
                $mstProyek->save();
                $mstProyek->ErrorType = 0;
            }
            else
            {
                $mstProyek = new mstProyek();
                $mstProyek->ErrorType = 1;
                $mstProyek->ErrorMessage = "Nama proyek sudah ada!";
            }
            
            return response($mstProyek->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (\Exception $e) {
            $mstProyek = new mstProyek();
            $mstProyek->ErrorType = 2;
            $mstProyek->ErrorMessage = $e->getMessage();
            return response()->json($mstProyek->jsonSerialize());
        }
    }
    
    public function IntegrasiProyek($proyek)
    {
        try {
            if(mstProyek::where('NamaProyek', $proyek['NamaProyek'])->count()==0)
            {
                $defaultPenanggungJawab = mstUser::where('IDRole', 3)->first();
                $mstProyek = new mstProyek();
                //$mstProyek->fill($request->all());
                $mstProyek->NamaProyek = $proyek['NamaProyek'];
                $mstProyek->InisialProyek = $proyek['InisialProyek'];
                $mstProyek->PinKeMenu = 1;
                $mstProyek->Percepatan = $proyek['Percepatan'];
                $mstProyek->PenanggungJawab = $defaultPenanggungJawab->IDUser; //penanggung jawab
                // $mstProyek->TanggalMulai = $proyek['TanggalMulai'];
                // $mstProyek->RencanaSelesai = $proyek['RencanaSelesai'];

                $dtNow = Carbon::now();
                $mstProyek->TanggalMulai = $dtNow->toDateString();
                if($mstProyek->Percepatan == 1)
                {
                    $mstProyek->RencanaSelesai = $dtNow->addWeekDays(7)->toDateString();
                }
                else
                {
                    $mstProyek->RencanaSelesai = $dtNow->addWeekDays(14)->toDateString();
                }
                
                // $mstProyek->RencanaSelesai = $proyek['RencanaSelesai'];

                $mstProyek->DeskripsiProyek = $proyek['DeskripsiProyek'];
                $mstProyek->SponsorProyek = $proyek['SponsorProyek'];
                $mstProyek->CreatedBy = 'Administrasi';
                // $mstProyek = $this->ChangeDateFormat($mstProyek);
                $mstProyek->save();
                $mstProyek->ErrorType = 0;
            }
            else
            {
                $mstProyek = new mstProyek();
                $mstProyek->ErrorType = 1;
                $mstProyek->ErrorMessage = "Nama proyek sudah ada!";
            }
            
            return $mstProyek;
            // return response($mstProyek->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (\Exception $e) {
            $mstProyek = new mstProyek();
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
            $mstProyek = new mstProyek();
            $mstProyek->ErrorType = 2;
            $mstProyek->ErrorMessage = $e->getMessage();
            return response()->json($mstProyek->jsonSerialize());
        }
    }

    public function GetListProyek()
    {
        try {
            $listProyek = vwProyek::all();
            $listProyek->ErrorType = 0;
            return $listProyek;
            // return response(vwProyek::all()->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $mstProyek = new mstProyek();
            $mstProyek->ErrorType = 2;
            $mstProyek->ErrorMessage = $e->getMessage();
            return response()->json($mstProyek->jsonSerialize());
        }
    }

    public function GetListProyekAdministrasi()
    {
        try
        {
            $listProyek = vwProyek::where('SiapBuatSertifikat', '!=' , null)->get();
            $listProyek->ErrorType = 0;
            return $listProyek;
        }
        catch (\Exception $e)
        {
            $listProyek = new vwProyek();
            $listProyek->ErrorType = 2;
            $listProyek->ErrorMessage = $e->getMessage();
            return $listProyek;
        }
    }

    public function UpdateProyek(Request $request)
    {
        try {
            $mstProyek = mstProyek::where('IDProyek', $request->IDProyek)->firstorfail();
            $mstProyek->fill($request->all());
            $mstProyek->UpdatedBy = Auth::user()->IDUser;
            $mstProyek = $this->ChangeDateFormat($mstProyek);
            if(mstProyek::where('NamaProyek', $request->NamaProyek)->where('IDProyek', '!=' , $mstProyek->IDProyek)->count()>0)
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
            $mstProyek = new mstProyek();
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
            $mstProyek = new mstProyek();
            $proyek->ErrorType = 2;
            $proyek->ErrorMessage = $e->getMessage(); 
            return $proyek;
        }
    }

    public function CreateUlasanProyek(Request $request)
    {
        try {
            $ulasan = new mstUlasan();
            // $ulasan->IDProyek = $request->IDProyek;
            $proyek = mstProyek::where('InisialProyek', $request->InisialProyek)->firstorfail();
            $ulsana->IDProyek = $proyek->IDProyek;
            $ulasan->Pertanyaan1 = $request->Pertanyaan1;
            $ulasan->Pertanyaan2 = $request->Pertanyaan2;
            $ulasan->Pertanyaan3 = $request->Pertanyaan3;
            $ulasan->Pertanyaan4 = $request->Pertanyaan4;
            $ulasan->Pertanyaan5 = $request->Pertanyaan5;
            $ulasan->Pertanyaan6 = $request->Pertanyaan6;
            $ulasan->Pertanyaan7 = $request->Pertanyaan7;
            $ulasan->Pertanyaan8 = $request->Pertanyaan8;
            $ulasan->Pertanyaan9 = $request->Pertanyaan9;
            $ulasan->KritikSaran = $request->KritikSaran;
            $ulasan->save();
            $ulasan->ErrorType = 0;
            return $ulasan;
        }
        catch (\Exception $e) {
            $ulasan = new mstUlasan();
            $ulasan->ErrorType = 2;
            $ulasan->ErrorMessage = $e->getMessage();
            return $ulasan;
        }
    }

    public function GetUlasanProyek($IDProyek)
    {
        try
        {
            $ulasan = vwUlasan::where('IDProyek', $IDProyek)->firstorfail();
            $ulasan->ErrorType = 0;
            return $ulasan;
        }
        catch(\Exception $e)
        {
            $ulasan = new vwUlasan();
            $ulasan->ErrorType = 2;
            $ulasan->ErrorMessage = $e->getMessage();
            return $ulasan;
        }
    }

    public function GetUlasanList($bulan, $tahun)
    {
        try
        {
            $ulasanList = vwUlasan::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get();
            $ulasanList->ErrorType = 0;
            return $ulasanList;
        }
        catch(\Exception $e)
        {
            $ulasanList = new vwUlasan();
            $ulasanList->ErrorType = 2;
            $ulasanList->ErrorMessage = $e->getMessage();
            return $ulasanList;
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
