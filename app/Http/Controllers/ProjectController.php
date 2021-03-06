<?php

namespace App\Http\Controllers;

use App\model\mstProyek;
use App\Http\Controllers\ControllersApi\ProyekControllerApi;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function indexProject()
    {
        return view('manajerTeknis.layout.page.project.halamanProject');
    }

    public function createProject()
    {
        return view ('manajerTeknis.layout.page.project.tambahProject');
    }

    public function editProject($IDProyek)
    {
        $mstProyek = new mstProyek();
        $ProyekController = new ProyekControllerApi();
        $mstProyek = $ProyekController->GetProyek($IDProyek);
        //return $mstRole;
        return view ('manajerTeknis.layout.page.project.editProject')->with('mstProyek', $mstProyek);
    }

    // laporan
    public function indexLaporan()
    {
        // $trxLapor = new trxLapor();
        // $TugasController = new TugasControllerApi();
        // $trxLapor = $TugasController->TindakLaporan($IDLapor);
        return view('manajerTeknis.layout.page.project.halamanLaporan');
    }

    
}
