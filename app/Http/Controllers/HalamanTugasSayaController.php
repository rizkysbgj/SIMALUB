<?php

namespace App\Http\Controllers;

use App\model\mstTugas;
use App\model\vwProyek;
use Illuminate\Http\Request;
use App\Http\Controllers\ControllersApi\ProyekControllerApi;
use App\Http\Controllers\ControllersApi\TugasControllerApi;
use App\Http\Controllers\HelpersController;

class HalamanTugasSayaController extends Controller
{
    public function indexHalamanTugasSaya()
    {
        $TugasControllerApi = new TugasControllerApi();
        $ListTugas = $TugasControllerApi->GetTugasSaya();
        $IDTugas = 0;
        if(count($ListTugas) > 0)
            $IDTugas = $ListTugas[0]->IDTugas;
        return view('manajerTeknis.layout.page.halamanTugasSaya.halamanTugasSaya', compact('IDTugas'));
    
    }

    public function taskList()
    {
        $TugasControllerApi = new TugasControllerApi();
        $mstTugasList = $TugasControllerApi->GetTugasSaya();
        return view('manajerTeknis.layout.page.halamanTugasSaya.showTugasSaya')->with('mstTugasList', $mstTugasList);
    }

    public function detailTask($IDTugas)
    {
        $TugasControllerApi = new TugasControllerApi();
        $mstTugasDetail = $TugasControllerApi->GetDetailTugas($IDTugas);
        return view('manajerTeknis.layout.page.halamanTugasSaya.detailTugasSaya')->with('mstTugasDetail', $mstTugasDetail);
    }

    public function notifikasi()
    {
        $helper = new HelpersController();
        $listNotifikasi = $helper->GetNotifikasi();
        return view('manajerTeknis.layout.partials._notifikasi')->with('listNotifikasi', $listNotifikasi);
    }
}
