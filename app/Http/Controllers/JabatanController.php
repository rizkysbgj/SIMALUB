<?php

namespace App\Http\Controllers;

use App\mstRole;
use App\Http\Controllers\ControllersApi\RoleControllerApi;
use Illuminate\Http\Request;
use Auth;

class JabatanController extends Controller
{
    public function indexJabatan()
    {
        return view('manajerTeknis.layout.page.jabatan.halamanJabatan');
    }

    public function createJabatan()
    {
        return view ('manajerTeknis.layout.page.jabatan.tambahJabatan');
    }

    public function editJabatan($IDRole)
    {
        $mstRole = new mstRole();
        $RoleController = new RoleControllerApi();
        $mstRole = $RoleController->GetRole($IDRole);
        //return $mstRole;
        return view ('manajerTeknis.layout.page.jabatan.editJabatan')->with('mstRole', $mstRole);
    }

    // private function GetRole($IDRole)
    // {
    //     try {
    //         $mstRole = RoleController::where('IDRole', $IDRole)->firstorfail();
    //         return $mstRole;
    //     }
    //     catch (Exception $e) {
    //         return response()->json(['error' => $e->getMessage()]);
    //     }
    // }
}
