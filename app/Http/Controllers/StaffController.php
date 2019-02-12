<?php

namespace App\Http\Controllers;

use App\mstUser;
use App\Http\Controllers\ControllersApi\UserController;
use Illuminate\Http\Request;


class StaffController extends Controller
{
    public function indexStaff()
    {
        return view('manajerTeknis.layout.page.staff.halamanStaff');
    }
    
    public function createStaff()
    {
        return view ('manajerTeknis.layout.page.staff.tambahStaff');
    }
    
    public function editStaff($IDUser)
    {
        $mstUser = new mstUser();
        $UserController = new UserController();
        $mstUser = $UserController->GetUser($IDUser);
        //return $mstRole;


        return view ('manajerTeknis.layout.page.staff.editStaff')->with('mstUser', $mstUser);
    }

}
