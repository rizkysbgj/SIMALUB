<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardTopManagementController extends Controller
{
    public function indexDashboardTopManagement()
    {
        return view('manajerTeknis.layout.page.dashboardTopManagement.halamandashboardTopManagement');
    }
    public function indexHalamanUraian()
    {
        return view('manajerTeknis.layout.page.dashboardTopManagement.halamanUraian');
    }
}
