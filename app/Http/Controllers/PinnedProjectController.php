<?php

namespace App\Http\Controllers;

use App\mstTugas;
use Illuminate\Http\Request;
use App\Http\Controllers\ControllersApi\TugasControllerApi;

class PinnedProjectController extends Controller
{
    public function indexPinned($IDProyek)
    {
        // $mstTugas = new mstTugas();
        // $mstTugasList = TugasController::GetListTugas($IDProyek);
        return view('manajerTeknis.layout.page.pinnedProject.halamanpinnedProject')->with('IDProyek', $IDProyek);
    }
    
    public function taskList($IDProyek)
    {
        $TugasControllerApi = new TugasControllerApi();
        $mstTugasList = $TugasControllerApi->GetListTugas($IDProyek);
        return view('manajerTeknis.layout.page.pinnedProject.showTugas')->with('mstTugasList', $mstTugasList);
    }

    public function detailTask($IDProyek)
    {
        $TugasControllerApi = new TugasControllerApi();
        $mstTugasDetail = $TugasControllerApi->GetDetailTugas($IDTugas);
        return view('manajerTeknis.layout.page.pinnedProject.detailTugas')->with('mstTugasDetail', $mstTugasDetail);
    }
}
