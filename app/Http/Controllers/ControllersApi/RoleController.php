<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Exception;
use App\mstrole;

class mstRoleController extends Controller
{

    public function CreateRole(Request $request)
    {
        try {
            $mstRole = new mstrole();
            $mstRole->Role = $request->Role;
            $mstRole->save();
            return response($mstRole->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetListRole()
    {
        try {
            return response(mstrole::all()->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetRole($IDRole)
    {
        try {
            $mstRole = mstrole::where('IDRole', $IDRole)->firstorfail();
            return response($mstRole->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function UpdateRole(Request $request, $RoleID)
    {
        try {
            $mstRole = mstrole::where('IDRole', $IDRole)->firstorfail();
            $mstRole->Role = $request->Role;
            $mstRole->save();
            return response($mstRole->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
