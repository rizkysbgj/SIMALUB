<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubKontrakController extends Controller
{
    public function CreateSubKontrak(Request $request)
    {
        try {
            $mstSubKontrak = new mstSubKontrak();
            $mstSubKontrak->fill($request->all());
            $mstSubKontrak->CreatedBy = "Admin";
            $mstSubKontrak->save();
            return response($mstSubKontrak->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetSubKontrak($IDSubKontrak)
    {
        try {
            $mstSubKontrak = mstSubKontrak::where('IDSubKontrak', $IDSubKontrak)->firstorfail();
            return response($mstSubKontrak->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetListSubKontrak()
    {
        try {
            $mstSubKontrakList = mstSubKontrak::all();
            return response($mstSubKontrakList->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function UpdateSubKontrak(Request $request)
    {
        try {
            $mstSubKontrak = mstSubKontrak::where('IDSubKontrak', $request->IDSubKontrak)->firstorfail();
            $mstSubKontrak->fill($request->all());
            $mstSubKontrak->UpdatedBy = "Admin";
            $mstSubKontrak->save();
            return response($mstSubKontrak->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}