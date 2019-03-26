<?php

namespace App\Http\Controllers;

use App\model\mstUser;
use App\Http\Controllers\ControllersApi\UserControllerApi;
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
        $UserController = new UserControllerApi();
        $mstUser = $UserController->GetUser($IDUser);
        //return $mstRole;

        return view ('manajerTeknis.layout.page.staff.editStaff')->with('mstUser', $mstUser);
    }
    public function editUser($IDUser)
    {
        $mstUser = new mstUser();
        $UserController = new UserControllerApi();
        $mstUser = $UserController->GetUser($IDUser);
        //return $mstRole;

        return view ('manajerTeknis.layout.partials._profilku')->with('mstUser', $mstUser);
    }

}
