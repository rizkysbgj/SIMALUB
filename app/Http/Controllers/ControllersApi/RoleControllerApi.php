<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Exception;
use App\mstrole;

class RoleControllerApi extends Controller
{

    public function CreateRole(Request $request)
    {
        try {
            $mstRole = new mstrole();
            if(mstrole::where('Role', $request->Role)->count() > 0)
            {
                $mstRole->ErrorType = 2;
                $mstRole->ErrorMessage = "Jabatan sudah ada!";
                return response($mstRole->jsonSerialize());
            }
            $mstRole->Role = $request->Role;
            $mstRole->save();
            $mstRole->ErrorType = 0;
            return response($mstRole->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (\Exception $e) {
            $mstRole->ErrorType = 2;
            $mstRole->ErrorMessage = $e->getMessage();
            return response($mstRole->jsonSerialize());
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
            return $mstRole;
            //return response($mstRole->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function UpdateRole(Request $request)
    {
        try {
            $mstRole = mstrole::where('IDRole', $request->IDRole)->firstorfail();
            if(mstrole::where('Role', $request->Role)->count() > 0)
            {
                $mstRole->ErrorType = 2;
                $mstRole->ErrorMessage = "Jabatan sudah ada!";
                return response($mstRole->jsonSerialize());
            }
            $mstRole->Role = $request->Role;
            $mstRole->save();
            $mstRole->ErrorType = 0;
            return response($mstRole->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $mstRole->ErrorType = 2;
            return response($mstRole->jsonSerialize());
        }
    }
}
