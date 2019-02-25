<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelperController extends Controller
{
    public function UploadFile(Request $request)
    {
        return $request->file('file');
        // if($request->file('file'))
        // {
        //     return "ada";
        // }
        // else
        // {
        //     return "ga ada";
        // }
    }
}
