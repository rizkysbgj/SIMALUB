<?php

namespace App\Http\Controllers\ControllersApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use App\mstSubKontrak;
use App\vwSubKontrak;
use Auth;
use Storage;
use App\Http\Controllers\HelpersController;

class SubKontrakControllerApi extends Controller
{
    public function CreateSubKontrak(Request $request)
    {
        try {
            $mstSubKontrak = new mstSubKontrak();
            $mstSubKontrak->fill($request->all());
            $mstSubKontrak->WaktuDikirim = Carbon::now()->toDateString();
            $mstSubKontrak->CreatedBy = Auth::user()->IDUser;
            $mstSubKontrak->save();
            return response($mstSubKontrak->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (\Exception $e) {
            $subKontrak = new mstSubKontrak();
            $subKontrak->ErrorType = 2;
            $subKontrak->ErrorMessage = $e->getMessage(); 
            return response($mstSubKontrak->jsonSerialize());
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
        }
    }

    public function UpdateSubKontrak(Request $request)
    {
        try {
            $mstSubKontrak = mstSubKontrak::where('IDSubKontrak', $request->IDSubKontrak)->firstorfail();
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

    public function UploadHasil(Request $request)
    {
        try {
            $mstSubKontrak = mstSubKontrak::where('IDSubKontrak', $request->IDSubKontrak)->firstorfail();
            if($request->hasFile('Attachment'))
            {
                $helper = new HelpersController();
                $Attachment = $request->file('Attachment');
                if($helper->cekFiles($Attachment))
                {
                    $mstSubKontrak->Attachment = $Attachment->store('public/files');
                    $mstSubKontrak->ContentType = $Attachment->getCLientMimeType();
                    $mstSubKontrak->NamaFile = $Attachment->getClientOriginalName();
                }
                else
                {
                    $subKontrak = new mstSubKontrak();
                    $subKontrak->ErrorType = 2;
                    $trxTugas->ErrorMessage = "Format File Tidak Valid"; 
                    return $subKontrak;
                }
            }
            $mstSubKontrak->WaktuDiterima = Carbon::now()->toDateString();
            $mstSubKontrak->Catatan = $request->Catatan;
            $mstSubKontrak->StatusSubKontrak = 1;
            $mstSubKontrak->UpdatedBy = Auth::user()->IDUser;
            
            $mstSubKontrak->save();
            $mstSubKontrak->ErrorType = 0;
            return response($mstSubKontrak->jsonSerialize(), Response::HTTP_CREATED);
        }
        catch (\Exception $e) {
            $subKontrak = new mstSubKontrak();
            $subKontrak->ErrorType = 2;
            $subKontrak->ErrorMessage = $e->getMessage(); 
            return response($mstSubKontrak->jsonSerialize());
        }
    }

    public function DownloadHasil($IDSubKontrak)
    {
        try
        {
            $subKontrak = mstSubKontrak::where('IDSubKontrak', $IDSubKontrak)->firstorfail();
            return Storage::download($subKontrak->Attachment, $subKontrak->NamaFile);
        }
        catch(\Exception $e)
        {
            $subKontrak = new mstSubKontrak();
            $subKontrak->ErrorType = 2;
            $subKontrak->ErrorMessage = $e->getMessage();
            return $subKontrak;
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
