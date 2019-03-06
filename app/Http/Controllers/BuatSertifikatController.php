<?php

namespace App\Http\Controllers;

use App\mstTugas;
use App\vwProyek;
use Illuminate\Http\Request;
use App\Http\Controllers\ControllersApi\ProyekControllerApi;
use App\Http\Controllers\ControllersApi\TugasControllerApi;

class BuatSertifikatController extends Controller
{
    Public function indexPinnedProjectAdministrasi()
    {
        return view('manajerTeknis.layout.page.administrasi.halamanpinnedProjectAdministrasi');
    }
    
    public function proyekList()
    {
        $ProyekControllerApi = new ProyekControllerApi();
        $mstProyekList = $ProyekControllerApi->GetListProyekAdministrasi();
        $IDProyek = $mstProyekList[0]->IDProyek;
        return view('manajerTeknis.layout.page.administrasi.showProyek', compact('IDProyek', 'mstProyekList'));
    }

    public function detailProyek($IDProyek)
    {
        $ProyekControllerApi = new TugasControllerApi();
        $mstProyekDetail = $ProyekControllerApi->AdministrasiGetListTugas($IDProyek);
        return view('manajerTeknis.layout.page.administrasi.detailProyek')->with('mstProyekDetail', $mstProyekDetail);
    }
}
