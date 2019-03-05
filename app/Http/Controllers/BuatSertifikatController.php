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
        // $vwProyek = vwProyek::where('IDProyek', $IDProyek)->first();
        // $ProyekControllerApi = new ProyekControllerApi();
        // $ListProyek = $ProyekControllerApi->GetListDetailTugas($IDProyek);
        // $IDTugas = 0;
        // if(count($ListProyek) > 0)
        //     $IDTugas = $ListProyek[0]->IDTugas;
        return view('manajerTeknis.layout.page.administrasi.halamanpinnedProjectAdministrasi');
    }
    
    public function proyekList()
    {
        $ProyekControllerApi = new ProyekControllerApi();
        $mstProyekList = $ProyekControllerApi->GetListProyekAdministrasi();
        return view('manajerTeknis.layout.page.administrasi.showProyek')->with('mstProyekList', $mstProyekList);
    }

    public function detailProyek($IDProyek)
    {
        $ProyekControllerApi = new TugasControllerApi();
        $mstProyekDetail = $ProyekControllerApi->AdministrasiGetListTugas($IDProyek);
        return view('manajerTeknis.layout.page.administrasi.detailProyek')->with('mstProyekDetail', $mstProyekDetail);
    }
}
