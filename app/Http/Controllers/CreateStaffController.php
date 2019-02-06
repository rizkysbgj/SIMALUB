<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateStaffController extends Controller
{
    public function createStaff()
    {
        return view ('manajerTeknis.layout.page.staff.tambahStaff');
    }
}
