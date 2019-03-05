<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelperController extends Controller
{
    public function testTBS()
    {
        // get the service
        $TBS = $this->get('opentbs');
        // load your template
        // $TBS->LoadTemplate('template.docx');
        // replace variables
        // $TBS->MergeField('client', array('name' => 'Ford Prefect'));
        // send the file
        // $TBS->Show(OPENTBS_DOWNLOAD, 'file_name.docx');
    }
}
