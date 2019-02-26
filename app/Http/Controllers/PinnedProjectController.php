<?php

namespace App\Http\Controllers;

use App\mstTugas;
use App\vwProyek;
use Illuminate\Http\Request;
use App\Http\Controllers\ControllersApi\ProyekControllerApi;
use App\Http\Controllers\ControllersApi\TugasControllerApi;

class PinnedProjectController extends Controller
{
    public function indexPinned($IDProyek)
    {
        $vwProyek = vwProyek::where('IDProyek', $IDProyek)->first();
        return view('manajerTeknis.layout.page.pinnedProject.halamanpinnedProject')->with('vwProyek', $vwProyek);
    }
    
    public function taskList($IDProyek)
    {
        $TugasControllerApi = new TugasControllerApi();
        $mstTugasList = $TugasControllerApi->GetListTugas($IDProyek);
        return view('manajerTeknis.layout.page.pinnedProject.showTugas')->with('mstTugasList', $mstTugasList);
    }

    public function detailTask($IDTugas)
    {
        $TugasControllerApi = new TugasControllerApi();
        $mstTugasDetail = $TugasControllerApi->GetDetailTugas($IDTugas);
        return view('manajerTeknis.layout.page.pinnedProject.detailTugas')->with('mstTugasDetail', $mstTugasDetail);
    }
}
