<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpersController extends Controller
{
    public function exportdocx($templateName)
    {
        // $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $templatePath = 'resource/template/' . $templateName;
        $section = $phpWord->addSection();
    }
}
