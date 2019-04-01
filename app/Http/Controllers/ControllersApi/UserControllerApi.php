<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Exception;
use App\model\mstUser;
use App\model\vwUser;
use Auth;

class UserControllerApi extends Controller
{
    public function CreateUser(Request $request)
    {
        try {
            $mstUser = new mstUser();
            if(mstUser::where('IDUser', $request->IDUser)->orwhere('NIK', $request->NIK)->count() > 0)
            {
                $mstUser->ErrorType = 1;
                $mstUser->ErrorMessage = "ID atau NIK sudah dipakai!";
                return response($mstUser->jsonSerialize());
            }
            if($request->hasFile('Avatar'))
            {
                $Attachment = $request->file('Avatar');
                $filename =  $request->IDUser.'.'.$Attachment->getClientOriginalExtension();
                $Attachment->storeAs('public/avatars', $filename);
                $mstUser->Avatar = $filename;
            }
            $mstUser->IDUser = $request->IDUser;
            $mstUser->NIK = $request->NIK;
            $mstUser->NamaLengkap = $request->NamaLengkap;
            $mstUser->IDRole = $request->IDRole;
            $mstUser->Email = $request->Email;
            $mstUser->Password = bcrypt($request->Password);
            $mstUser->Status = $request->Status;
            /*upload avatar
             *
             * code di sini
             * 
             */
            $mstUser->CreatedBy = Auth::user()->IDUser;
            $mstUser->save();
            $mstUser->ErrorType = 0;
            return response($mstUser->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (\Exception $e) {
            $mstUser = new mstUser();
            $mstUser->ErrorType = 2;
            $mstUser->ErrorMessage = $e->getMessage();
            return response($mstUser->jsonSerialize());
        }
    }

    public function GetUser($IDUser)
    {
        try {
            $mstUser = mstUser::where('IDUser', $IDUser)->firstorfail();
            return $mstUser;
            // return response($mstUser->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $mstUser = new mstUser();
            $mstUser->ErrorType = 2;
            $mstUser->ErrorMessage = $e->getMessage();
            return response($mstUser->jsonSerialize());
        }
        
    }

    public function GetListUser($IDRole)
    {
        try {
            if($IDRole != 0)
            {
                if($IDRole == 4 || $IDRole == 5)
                {
                    $userList = vwUser::where('IDRole', '4')->orwhere('IDRole', '5')
                        ->where('IDUser', '!=', Auth::user()->IDUser)->get();
                    return response($userList, Response::HTTP_OK);
                }
                else
                    return response(vwUser::where('IDRole', $IDRole)->get(), Response::HTTP_OK);
            }
            else
                return response(vwUser::all()->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $mstUser = new vwUser();
            $mstUser->ErrorType = 2;
            $mstUser->ErrorMessage = $e->getMessage();
            return response($mstUser->jsonSerialize());
        }
    }

    public function UpdateUser(Request $request)
    {
        try {
            if(mstUser::where('NIK', $request->NIK)->where('IDUser', '!=', $request->IDUser)
                ->count() > 0)
            {
                $mstUser->ErrorType = 1;
                $mstUser->ErrorMessage = "NIK sudah dipakai!";
                return response($mstUser->jsonSerialize());
            }
            $mstUser = mstUser::where('IDUser', $request->IDUser)->firstorfail();
            if($request->hasFile('Avatar'))
            {
                $Attachment = $request->file('Avatar');
                $filename =  $request->IDUser.'.'.$Attachment->getClientOriginalExtension();
                $Attachment->storeAs('public/avatars', $filename);
                $mstUser->Avatar = $filename;
            }
            $mstUser->NamaLengkap = $request->NamaLengkap;
            $mstUser->IDRole = $request->IDRole;
            $mstUser->Email = $request->Email;
            if($request->Password != null)
            {
                $mstUser->Password = bcrypt($request->Password);
            }
            $mstUser->Status = $request->Status;
            $mstUser->UpdatedBy = Auth::user()->IDUser;
            /*Update Avatar
             *
             * Code di sini 
             * 
             */
            $mstUser->save();
            $mstUser->ErrorType = 0;
            return response($mstUser->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $mstUser = new mstUser();
            $mstUser->ErrorType = 2;
            $mstUser->ErrorMessage = $e->getMessage();
            return response($mstUser->jsonSerialize());
        }
    }

    public function DeleteUser($IDUser)
    {
        try
        {
            $user = mstUser::where('IDUser', $IDUser)->firstorfail();
            // $user = mstUser::findordfail($IDUser);
            $user->delete();
            $user->ErrorType = 0;
            return $user;
        }
        catch (\Exception $e)
        {
            $user = new mstUser();
            $user->ErrorType = 2;
            $user->ErrorMessage = $e->getMessage(); 
            return $user;
        }
    }

    public function UpdateProfile(Request $request)
    {
        try {
            if(mstUser::where('NIK', $request->NIK)->where('IDUser', '!=', Auth::user()->IDUser)
                ->count() > 0)
            {
                $mstUser->ErrorType = 1;
                $mstUser->ErrorMessage = "NIK sudah dipakai!";
                return response($mstUser->jsonSerialize());
            }
            $mstUser = mstUser::where('IDUser', Auth::user()->IDUser)->firstorfail();
            if($request->hasFile('Avatar'))
            {
                $Attachment = $request->file('Avatar');
                $filename =  $request->IDUser.'.'.$Attachment->getClientOriginalExtension();
                $Attachment->storeAs('public/avatars', $filename);
                $mstUser->Avatar = $filename;
            }
            $mstUser->NamaLengkap = $request->NamaLengkap;
            $mstUser->IDRole = $request->IDRole;
            $mstUser->Email = $request->Email;
            if($request->Password != null)
            {
                $mstUser->Password = bcrypt($request->Password);
            }
            $mstUser->Status = $request->Status;
            $mstUser->UpdatedBy = Auth::user()->IDUser;
            /*Update Avatar
             *
             * Code di sini 
             * 
             */
            $mstUser->save();
            $mstUser->email = $mstUser->IDUser;
            Auth::login($mstUser);
            $mstUser->ErrorType = 0;
            return response($mstUser->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $mstUser = new mstUser();
            $mstUser->ErrorType = 2;
            $mstUser->ErrorMessage = $e->getMessage();
            return response($mstUser->jsonSerialize());
        }
    }
}
