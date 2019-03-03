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
        $TugasControllerApi = new TugasControllerApi();
        $ListTugas = $TugasControllerApi->GetListDetailTugas($IDProyek);
        $IDTugas = 0;
        if(count($ListTugas) > 0)
            $IDTugas = $ListTugas[0]->IDTugas;
        return view('manajerTeknis.layout.page.pinnedProject.halamanpinnedProject', compact('vwProyek', 'IDTugas'));
    }
    
    public function taskList($IDProyek)
    {
        $TugasControllerApi = new TugasControllerApi();
        $mstTugasList = $TugasControllerApi->GetListDetailTugas($IDProyek);
        return view('manajerTeknis.layout.page.pinnedProject.showTugas')->with('mstTugasList', $mstTugasList);
    }

    public function detailTask($IDTugas)
    {
        $TugasControllerApi = new TugasControllerApi();
        $mstTugasDetail = $TugasControllerApi->GetDetailTugas($IDTugas);
        return view('manajerTeknis.layout.page.pinnedProject.detailTugas')->with('mstTugasDetail', $mstTugasDetail);
    }
}
