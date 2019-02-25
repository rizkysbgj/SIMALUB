<?php

namespace App\Http\Controllers;

use App\mstProyek;
use App\Http\Controllers\ControllersApi\ProyekControllerApi;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function indexProject()
    {
        xdebug_break();
        return view('manajerTeknis.layout.page.project.halamanProject');
    }

    public function createProject()
    {
        xdebug_break();
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
}
