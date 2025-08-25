<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omzet;
use Carbon\Carbon;

class OmzetController extends Controller
{
        public function index()
    {
        // total semua omzet
        $totalOmzet = Omzet::sum('total_omzets');

        // omzet bulan ini
        $omzetBulanIni = Omzet::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get();

        $totalBulanIni = $omzetBulanIni->sum('total_omzets');

        // group per bulan (buat history)
        $perBulan = Omzet::selectRaw('YEAR(created_at) year, MONTH(created_at) month, SUM(total_omzets) total')
            ->groupBy('year','month')
            ->orderBy('year','desc')
            ->orderBy('month','desc')
            ->get();

        return view('page.user.omzet', compact('totalOmzet','omzetBulanIni','totalBulanIni','perBulan'));
    }

}
