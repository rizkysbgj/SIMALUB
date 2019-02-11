<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Exception;
use App\mstProyek;

class ProyekController extends Controller
{
    public function CreateProyek(Request $request)
    {
        try {
            $mstProyek = new mstProyek();
            $mstProyek->fill($request->all());
            $mstProyek->CreatedBy = "Admin";
            $mstProyek->save();
            return response($mstProyek->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetProyek($IDProyek)
    {
        try {
            $mstProyek = mstProyek::where('IDProyek', $IDProyek)->firstorfail();
            return response($mstProyek->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function GetListProyek()
    {
        try {
            return response(mstProyek::all()->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function UpdateProyek(Request $request)
    {
        try {
            $mstProyek = mstProyek::where('IDProyek', $request->IDProyek)->firstorfail();
            $mstProyek->fill($request->all());
            $mstProyek->UpdatedBy = "Admin";
            $mstProyek->save();
            return response($mstProyek->jsonSerialize(), Response::HTTP_OK);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
