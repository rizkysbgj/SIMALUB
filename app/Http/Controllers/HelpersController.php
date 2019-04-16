<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\model\mstNotifikasi;
use App\model\vwNotifikasi;
use Carbon\Carbon;
use Auth;

class HelpersController extends Controller
{
    public function exportmemo()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = $phpWord->loadTemplate(storage_path('template_memo.docx'));
        // $template->setValue('test', 'Hello');

        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=memo.docx");
        
        $template->saveAs(storage_path('memo.docx'));
        readfile(storage_path('memo.docx'));
        unlink(storage_path('memo.docx'));
    }

    public function exportsertifikat()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = $phpWord->loadTemplate(storage_path('template_sertifikat.docx'));
        // $template->setValue('test', 'Hello');

        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=sertifikat.docx");
        
        $template->saveAs(storage_path('sertifikat.docx'));
        readfile(storage_path('sertifikat.docx'));
        unlink(storage_path('sertifikat.docx'));
    }

    public function exportdocx($templatename)
    {
        // $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $templatename .= ".docx";
        $filename = "result.docx";
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = $phpWord->loadTemplate(storage_path($templatename));
        $template->setValue('test', 'Hello');

        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=result.docx");
        
        $template->saveAs(storage_path('result.docx'));
        readfile(storage_path('result.docx'));
        unlink(storage_path('result.docx'));
    }

    public function cekFiles($File)
    {
        $allowedContentType = array("application/zip" , "application/pdf" , 
            "application/msword" , "vnd.openxmlformats-officedocument.wordprocessingml.document", 
            "application/vnd.ms-excel" , "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" , 
            "text/plain" , "image/png" , "image/jpeg");
        if(in_array($File->getCLientMimeType(), $allowedContentType, TRUE))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function GetNotifikasi()
    {
        $notifikasi = new vwNotifikasi();
        $dtnow = Carbon::now()->toDateTimeString();;
        // $admin = 'admin';
        if(Auth::user()->IDRole == 3 || Auth::user()->IDRole == 6)
            $notifikasi->notifikasiList = vwNotifikasi::where('IDUser', 'ManajerTeknis')->orderBy('Dibaca', 'asc')->get();
        else
            $notifikasi->notifikasiList = vwNotifikasi::where('IDUser', Auth::user()->IDUser)->orderBy('Dibaca', 'asc')->orderBy('created_at', 'desc')->get();
        $notifikasi->totalNotifikasi = $notifikasi->notifikasiList->where('Dibaca', false)->count();
        return $notifikasi;
    }

    public function ReadNotifikasi(Request $request)
    {
        $updateValue = 1;
        $notifikasiList = mstNotifikasi::where('IDNotifikasi', $request->IDNotifikasi)->first();
        $notifikasiList->Dibaca = $updateValue;
        $notifikasiList->save();
        return $notifikasiList;
    }
}
