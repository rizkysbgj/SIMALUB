<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vwDashboardManajerTeknis;
use App\vwStatistikProyek;
use App\vwTugas;
use App\viewmodel\vmDashboardManajerPuncak;
use DateTime;

class DashboardControllerApi extends Controller
{
    public function DashboardManajerTeknis($IDProyek)
    {
        try
        {
            $dashboard = vwDashboardManajerTeknis::where('IDProyek', $IDProyek)->firstorfail();
            $dashboard->Persentase = (int)($dashboard->TugasSelesai / $dashboard->TotalTugas * 100);
            $tanggalMulai = new DateTime($dashboard->TanggalMulai);
            $rencanaSelesai = new DateTime($dashboard->RencanaSelesai);
            $dashboard->TotalHari = date_diff($tanggalMulai, $rencanaSelesai)->days;

            $dashboard->posisiTugasList = vwTugas::where('IDProyek', $IDProyek)->where('StatusKajiUlang', '!=' ,'Tidak')->orderBy('IDTugas', 'asc')->get();
            
            $dashboard->ErrorType = 0;
            return $dashboard;
        }
        catch (\Exception $e)
        {
            $dashboard = new vwDashboardManajerTeknis();
            $dashboard->ErrorType = 2;
            $dashboard->ErrorMessage = $e->getMessage();
            return $dashboard;
        }
    }

    public function DashboardManajerPuncak($tahun)
    {
        try
        {
            $dashboard = new vmDashboardManajerPuncak();
            $statistikProyek = vwStatistikProyek::where('Tahun', $tahun)->get();
            $dashboard->statistikBulanan = $statistikProyek;
            $dashboard->totalProyek = $statistikProyek->sum('TotalProyek');
            $dashboard->totalProyekSelesai = $statistikProyek->sum('TotalSelesai');
            $dashboard->totalProyekBerlangsung = $statistikProyek->sum('TotalBerlangsung');
            $dashboard->persentaseSelesai = (int)($dashboard->totalProyekSelesai/$dashboard->totalProyek * 100);
            $dashboard->persentaseBelumSelesai = (int)($dashboard->totalProyekBerlangsung/$dashboard->totalProyek * 100);

            $dashboard->ErrorType = 0;
            return $dashboard;
        }
        catch (\Exception $e)
        {
            $dashboard = new vmDashboardManajerPuncak();
            $dashboard->ErrorType = 2;
            $dashboard->ErrorMessage = $e->getMessage();
            return $dashboard;
        }
    }
}
