<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vwDashboardManajerTeknis;
use App\vwStatistikProyek;
use App\vwTugas;
use App\vwProyek;
use App\viewmodel\vmDashboardManajerPuncak;
use DateTime;

class DashboardControllerApi extends Controller
{
    public function DashboardManajerTeknis($IDProyek)
    {
        try
        {
            $dashboard = vwDashboardManajerTeknis::where('IDProyek', $IDProyek)->firstorfail();
            if($dashboard->TotalTugas > 0)
            {
                $dashboard->Persentase = (int)($dashboard->TugasSelesai / $dashboard->TotalTugas * 100);
            }
            else
            {
                $dashboard->Persentase = 0;
            }
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

    public function GetKesalahanAnalisis($IDProyek)
    {
        try
        {
            $kesalahanAnalisis = vwTugas::where('IDProyek', $IDProyek)->where('StatusKajiUlang', '!=' ,'Tidak')->orderBy('IDTugas', 'asc')->get();
            $kesalahanAnalisis->ErrorType = 0;
            return $kesalahanAnalisis;
        }
        catch (\Exception $e)
        {
            $kesalahanAnalisis = new vwTugas();
            $kesalahanAnalisis->ErrorType = 2;
            $kesalahanAnalisis->ErrorMessage = $e->getMessage();
            return $kesalahanAnalisis;
        }
    }

    public function GetWaktuTerbuang($IDProyek)
    {
        try
        {
            $tugasList = vwTugas::where('IDProyek', $IDProyek)->where('StatusKajiUlang', '!=' ,'Tidak')->where('RealitaSelesai', "!=", null)->orderBy('IDTugas', 'asc')->get();
            $proyek = vwProyek::where('IDProyek', $IDProyek)->firstorfail();
            $tugasTelat = array();
            $max = 0;
            foreach($tugasList as $tugas)
            {
                $tugasSelesai = new DateTime($tugas->RealitaSelesai);
                $proyekDeadline = new DateTime($proyek->RencanaSelesai);  
                if($tugasSelesai > $proyekDeadline)
                {
                    $tugas->Selisih = date_diff($tugasSelesai, $proyekDeadline)->days;
                    if($tugas->Selisih > $max)
                        $max = $tugas->Selisih;
                    array_push($tugasTelat, $tugas);
                }
            }
            $tugasTelat["SelisihMax"] = $max;
            return $tugasTelat;
        }
        catch (\Exception $e)
        {
            $tugasList = new vwTugas();
            $tugasList->ErrorType = 2;
            $tugasList->ErrorMessage = $e->getMessage();
            return $tugasList;
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
            if($dashboard->totalProyek > 0)
            {
                $dashboard->persentaseSelesai = (int)($dashboard->totalProyekSelesai/$dashboard->totalProyek * 100);
                $dashboard->persentaseBelumSelesai = (int)($dashboard->totalProyekBerlangsung/$dashboard->totalProyek * 100);
            }
            else
            {
                $dashboard->persentaseSelesai = 0;
                $dashboard->persentaseBelumSelesai = 0;
            }
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
