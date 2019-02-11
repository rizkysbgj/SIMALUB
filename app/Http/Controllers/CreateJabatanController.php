<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateJabatanController extends Controller
{
    public function createJabatan()
    {
        return view ('manajerTeknis.layout.page.jabatan.tambahJabatan');
    }
}
