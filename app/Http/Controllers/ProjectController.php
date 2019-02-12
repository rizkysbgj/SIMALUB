<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function createProject()
    {
        return view ('manajerTeknis.layout.page.project.tambahProject');
    }

    public function editProject($IDProyek)
    {
        $mstProyek = new mstProyek();
        $ProjectController = new ProjectController();
        $mstProyek = $ProjectController->GetProyek($IDProyek);
        //return $mstRole;
        return view ('manajerTeknis.layout.page.project.editProject')->with('mstProyek', $mstProyek);
    }
}
