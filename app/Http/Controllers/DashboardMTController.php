<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllersApi\DashboardControllerApi;


class DashboardMTController extends Controller
{
    public function indexDashboardMT()
    {
        return view('manajerTeknis.layout.page.dashboardMT.halamandashboardMT');
    }

    public function detailDashboardMT($IDProyek)
    {
        $DashboardControllerApi = new DashboardControllerApi();
        $mstDashboardMT = $DashboardControllerApi->DashboardManajerTeknis($IDProyek);
        return view('manajerTeknis.layout.page.dashboardMT.detailDashboardMT')->with('mstDashboardMT', $mstDashboardMT);
    }
}
