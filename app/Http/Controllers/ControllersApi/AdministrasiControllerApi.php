<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\vwProyek;
use App\model\mstSertifikat;

class AdministrasiControllerApi extends Controller
{
    public function GetTotalPembuatanSertifikat()
    {
        try
        {
            $count = vwProyek::where('SiapBuatSertifikat', '!=' , null)->where('RealitaSelesai', null)->count();
            return $count;
        }
        catch (\Exception $e)
        {
            $listProyek = new vwProyek();
            $listProyek->ErrorType = 2;
            $listProyek->ErrorMessage = $e->getMessage();
            return $listProyek;
        }
    }

    public function GetListSertifikat()
    {
        try
        {
            $sertifikatList = mstSertifikat::get();
            $sertifikatList->ErrorType = 0;
            return $sertifikatList;
        }
        catch (\Exception $e)
        {
            $sertifikatList = new mstSertifikat();
            $sertifikatList->ErrorType = 2;
            $sertifikatList->ErrorMessage = $e->getMessage();
            return $sertifikatList;
        }
    }

    public function DownloadSertifikat($IDProyek)
    {
        try
        {
            $sertifikat = mstSertifikat::where('IDProyek', $IDProyek)->firstorfail();
            return Storage::download($sertifikat->Attachment, $sertifikat->NamaFile);
        }
        catch(\Exception $e)
        {
            $sertifikat = new mstSertifikat();
            $sertifikat->ErrorType = 2;
            $sertifikat->ErrorMessage = $e->getMessage();
            return $sertifikat;
        }
    }
}
