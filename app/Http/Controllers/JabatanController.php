<?php

namespace App\Http\Controllers;

use App\mstRole;
use App\Http\Controllers\ControllersApi\RoleController;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function createJabatan()
    {
        return view ('manajerTeknis.layout.page.jabatan.tambahJabatan');
    }

    public function editJabatan($IDRole)
    {
        $mstRole = new mstRole();
        $RoleController = new RoleController();
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
