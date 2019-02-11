<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Exception;
use App\mstUser;

class mstUserController extends Controller
{
    public function CreateUser(Request $request)
    {
        try {
            $mstUser = new mstUser();
            $mstUser->fill($request->all());
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
            $mstUser->NamaLengkap = $request->NamaLengkap;
            $mstUser->IDRole = $request->IDRole;
            $mstUser->Password = md5($request->Password);
            $mstUser->UpdatedBy = "Admin";
            $mstUser->save();
            return response($mstUser->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
