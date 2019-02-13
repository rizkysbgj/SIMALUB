<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mstTugas;
use App\Http\Controllers\ControllersApi\TugasController;

class TugasController extends Controller
{
    public function indexTugas($IDProyek){
        return view('manajerTeknis.layout.page.tugas.halamanTugas')->with('IDProyek', $IDProyek);
    }

    public function createTugas($IDProyek)
    {
        return view ('manajerTeknis.layout.page.tugas.tambahTugas')->with('IDProyek', $IDProyek);
    }

    public function editTugas($IDTugas)
    {
        $msttugas = new mstTugas();
        $TugasController = new TugasController();
        $msttugas = $TugasController->GetTugas($IDTugas);
        //return $mstRole;
        return view ('manajerTeknis.layout.page.tugas.editTugas')->with('msttugas', $msttugas);
     
    }
}
