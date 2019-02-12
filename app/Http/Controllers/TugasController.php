<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function createTugas()
    {
        return view ('manajerTeknis.layout.page.tugas.tambahTugas');
    }
}
