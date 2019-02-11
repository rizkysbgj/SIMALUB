<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Exception;
use App\mstUser;

class UserController extends Controller
{
    public function CreateUser(Request $request)
    {
        try {
            $mstUser = new mstUser();
            $mstUser->IDUser = $request->IDUser;
            $mstUser->NIK = $request->NIK;
            $mstUser->NamaLengkap = $request->NamaLengkap;
            $mstUser->IDRole = $request->IDRole;
            $mstUser->Email = $request->Email;
            $mstUser->Password = bcrypt($request->Password);
            $mstUser->Status = $request->Status;
            $mstUser->CreatedBy = "Admin";
            $mstUser->save();
            return response($mstUser->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetUser($IDUser)
    {
        try {
            $mstUser = mstUser::where('IDUser', $IDUser)->firstorfail();
            return response($mstUser->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
        
    }

    public function GetListUser()
    {
        try {
            return response(mstUser::all()->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function UpdateUser(Request $request)
    {
        try {
            $mstUser = mstUser::where('IDUser', $request->IDUser)->firstorfail();
            $mstUser->IDUser = $request->IDUser;
            $mstUser->NIK = $request->NIK;
            $mstUser->NamaLengkap = $request->NamaLengkap;
            $mstUser->IDRole = $request->IDRole;
            $mstUser->Password = bcrypt($request->Password);
            $mstUser->Status = $request->Status;
            $mstUser->UpdatedBy = "Admin";
            $mstUser->save();
            $mstUser->ErrorType = 0;
            return response($mstUser->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
