<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPerformaAnalisController extends Controller
{
    public function indexDashboardPerformaAnalis()
    {
        return view('manajerTeknis.layout.page.dashboardPerformaAnalis.halamandashboardPerformaAnalis');
    }
}
