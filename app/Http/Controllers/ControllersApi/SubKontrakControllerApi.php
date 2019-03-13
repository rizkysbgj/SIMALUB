<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mstSubKontrak;
use App\vwSubKontrak;

class SubKontrakControllerApi extends Controller
{
    public function CreateSubKontrak(Request $request)
    {
        try {
            $mstSubKontrak = new mstSubKontrak();
            $mstSubKontrak->fill($request->all());
            $mstSubKontrak->CreatedBy = Auth::user()->IDUser;
            $mstSubKontrak->save();
            return response($mstSubKontrak->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (\Exception $e) {
            $subKontrak = new mstSubKontrak();
            $subKontrak->ErrorType = 2;
            $subKontrak->ErrorMessage = $e->getMessage(); 
            return response($mstSubKontrak->jsonSerialize());
            // return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetSubKontrak($IDSubKontrak)
    {
        try {
            $mstSubKontrak = mstSubKontrak::where('IDSubKontrak', $IDSubKontrak)->firstorfail();
            return response($mstSubKontrak->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $subKontrak = new mstSubKontrak();
            $subKontrak->ErrorType = 2;
            $subKontrak->ErrorMessage = $e->getMessage(); 
            return response($subKontrak->jsonSerialize());
            //return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetListSubKontrak($IDProyek)
    {
        try {
            $subKontrakList = vwSubKontrak::where('IDProyek', $IDProyek)->get();
            return $subKontrakList;
        }
        catch (\Exception $e) {
            $subKontrak = new mstSubKontrak();
            $subKontrak->ErrorType = 2;
            $subKontrak->ErrorMessage = $e->getMessage(); 
            return $subKontrak;
            //return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function UpdateSubKontrak(Request $request)
    {
        try {
            $mstSubKontrak = mstSubKontrak::where('IDSubKontrak', $request->IDSubKontrak)->firstorfail();
            $mstSubKontrak->fill($request->all());
            $mstSubKontrak->UpdatedBy = Auth::user()->IDUser;
            $mstSubKontrak->save();
            return response($mstSubKontrak->jsonSerialize(), Response::HTTP_OK);
        }
        catch (\Exception $e) {
            $subKontrak = new mstSubKontrak();
            $subKontrak->ErrorType = 2;
            $subKontrak->ErrorMessage = $e->getMessage(); 
            return response($mstSubKontrak->jsonSerialize());
        }
    }

    public function DeleteSubKontrak($IDSubKontrak)
    {
        try
        {
            $subKontrak = mstSubKontrak::where('IDSubKontrak', $IDSubKontrak)->firstorfail();
            $subKontrak->delete();
            $subKontrak->ErrorType = 0;
            return $subKontrak;
        }
        catch (\Exception $e)
        {
            $subKontrak = new mstSubKontrak();
            $subKontrak->ErrorType = 2;
            $subKontrak->ErrorMessage = $e->getMessage(); 
            return $subKontrak;
        }
    }
}
