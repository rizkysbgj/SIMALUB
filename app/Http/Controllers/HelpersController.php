<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpersController extends Controller
{
    public function exportsertifikat()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = $phpWord->loadTemplate(storage_path('template_sertifikat'));
        // $template->setValue('test', 'Hello');

        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=result.docx");
        
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
}
