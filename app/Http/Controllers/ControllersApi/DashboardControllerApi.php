<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vwDashboardManajerTeknis;
use App\vwTugas;
use DateTime;

class DashboardControllerApi extends Controller
{
    public function DashboardManajerTeknis($IDProyek)
    {
        try
        {
            $dashboard = vwDashboardManajerTeknis::where('IDProyek', $IDProyek)->firstorfail();
            $dashboard->Persentase = $dashboard->TugasSelesai / $dashboard->TotalTugas * 100;
            $tanggalMulai = new DateTime($dashboard->TanggalMulai);
            $rencanaSelesai = new DateTime($dashboard->RencanaSelesai);
            $dashboard->TotalHari = date_diff($tanggalMulai, $rencanaSelesai)->days;

            $dashboard->posisiTugasList = vwTugas::where('IDProyek', $IDProyek)->where('Status', 'Bisa')->get();
            
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
}
