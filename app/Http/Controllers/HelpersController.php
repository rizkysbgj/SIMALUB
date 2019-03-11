<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpersController extends Controller
{
    public function exportdocx($templatename)
    {
        // $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $templatename .= ".docx";
        $filename = "result.docx";
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = $phpWord->loadTemplate(storage_path($templatename));
        $template->setValue('test', 'Hello');

        $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
        $template->save(storage_path('result2'));

        // header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename='result.docx'");
        // $template->saveAs(storage_path('result.docx'));
        readfile(storage_path('result2'));
        unlink($temp_file);
    }
}
