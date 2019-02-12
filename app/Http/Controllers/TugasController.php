<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function indexTugas($IDProyek){
        return view('manajerTeknis.layout.page.tugas.halamanTugas')->with('IDProyek', $IDProyek);
    }

    public function createTugas($IDProyek)
    {
        return view ('manajerTeknis.layout.page.tugas.tambahTugas')->with('IDProyek', $IDProyek);
    }
}
