<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use App\model\mstProyek;
use App\model\vwTugas;
use App\Http\Controllers\ControllersApi\ProyekControllerApi;
use App\Http\Controllers\ControllersApi\TugasControllerApi;

class IntegrasiApi extends Controller
{
    public function CreatePesananProyek(Request $request)
    {
        try {
            $proyek = $request->proyek;
            //call CreateProyek Function
            $ProyekControllerApi = new ProyekControllerApi();
            $proyek = $ProyekControllerApi->IntegrasiProyek($proyek);

            $tugasList = $request->tugasList;
            $TugasControllerApi = new TugasControllerApi();
            //loop tugas
            foreach($tugasList as $tugas)
            {
                //call CreateTugas Function
                $tugas = $TugasControllerApi->IntegrasiTugas($tugas, $proyek->IDProyek, $proyek->RencanaSelesai);
            }
            return "Success";
        }
        catch (\Exception $e) {
            $mstProyek = new mstProyek();
            $mstProyek->ErrorType = 2;
            $mstProyek->ErrorMessage = $e->getMessage();
            return response()->json($mstProyek->jsonSerialize());
        }
    }

    public function GetTracking2($IDProyek)
    {
        try {
            $tracking = [];
            $tugasList = new vwTugas();
            $tugasList = vwTugas::where('IDProyek', $IDProyek)->where('StatusKajiUlang', '!=' ,'Tidak')->orderBy('IDTugas', 'asc')->get();
            foreach($tugasList as $tugas) {
                if(in_array($tugas->IDMilestoneTugas, [1,2,3,4,5,6,7,8,9,10]))
                {
                    $tracking[] = [
                        'IDTugas' => $tugas->IDTugas,
                        'StatusTracking' => 'Dianalisis'
                    ];
                }    
                else
                {
                    $tracking[] = [
                        'IDTugas' => $tugas->IDTugas,
                        'StatusTracking' => 'Selesai'
                    ];
                }
            }
            return $tracking;
        }
        catch (\Exception $e)
        {
            $trackingTugas = new vwTugas();
            $trackingTugas->ErrorType = 2;
            $trackingTugas->ErrorMessage = $e->getMessage();
            return response()->json($trackingTugas->jsonSerialize());
        }
    }

    public function GetTracking($IDProyek)
    {
        try {
            $tracking = [];
            $tugasList = new vwTugas();
            $tugasList = vwTugas::where('IDProyek', $IDProyek)->where('StatusKajiUlang', '!=' ,'Tidak')->orderBy('IDTugas', 'asc');
            $countTugas = $tugasList->count();
            if($tugasList->where('IDMileStoneTugas', 11)->count() == $countTugas)
            {
                $tracking[] = [
                    'IDPesanan' => $IDProyek,
                    'Status' => "Selesai"
                ];
            }
            else
            {
                $tracking[] = [
                    'IDPesanan' => $IDProyek,
                    'Status' => "Dianalisis"
                ];
            }
            return $tracking;
        }
        catch (\Exception $e)
        {
            $trackingTugas = new vwTugas();
            $trackingTugas->ErrorType = 2;
            $trackingTugas->ErrorMessage = $e->getMessage();
            return response()->json($trackingTugas->jsonSerialize());
        }
    }

    public function SendTrackingStatus($IDProyek, $statusTracking)
    {
        try
        {
            //send status pesanan + date time now
            $proyek = new mstProyek();
            $proyek = mstProyek::where('IDProyek', $IDProyek)->firstorfail();
            if($proyek->StatusPengerjaan == NULL && $statusTracking == 1)
            {
                $proyek->StatusPengerjaan = 1;
                //post to api ecomerce to update status pesanan + updated date where No.Pesanan = InisialProyek
            }
            else if($proyek->StatusPengerjaan == 1 && $statusTracking == 2)
            {
                $proyek->StatusPengerjaan = 2;
                //post to api ecomerce to update status pesanan + updated date where No.Pesanan = InisialProyek
            }
            else if($proyek->StatusPengerjaan == 2 && $statusTracking == 3)
            {
                $proyek->StatusPengerjaan = 3;
                //post to api ecomerce to update status pesanan + updated date where No.Pesanan = InisialProyek
            }
            
            return "Sukses";
        }
        catch (\Exception $e)
        {
            $proyek = new mstProyek();
            $proyek->ErrorType = 2;
            $proyek->ErrorMessage = $e->getMessage();
            return $proyek;
        }
    }

    public function GetDetailTracking($IDProyek)
    {
        try {
            $detail = [];
            $proyek = new mstProyek();
            $proyek = mstProyek::where('IDProyek', $IDProyek)->firstorfail();
            $detail[] = [
                'Dianalisis' => $proyek->TanggalMulai,
                'Selesai' => $proyek->RealitaSelesai
            ];

            return $detail;
        }
        catch (\Exception $e)
        {
            $proyek = new mstProyek();
            $proyek->ErrorType = 2;
            $proyek->ErrorMessage = $e->getMessage();
            return response()->json($proyek->jsonSerialize());
        }
    }
}
