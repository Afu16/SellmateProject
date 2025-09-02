<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omzet;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // total omzet semua waktu
        $totalOmzet = Omzet::sum('total_omzets');

        // total omzet bulan ini
        $totalOmzetBulanIni = Omzet::whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->sum('total_omzets');

        // semua transaksi bulan ini
        $omzetBulanIni = Omzet::whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->get();

        // hitung rata-rata omzet bulan ini
        $jumlahTransaksi = $omzetBulanIni->count();
        $rataOmzet = $jumlahTransaksi > 0 ? $totalOmzetBulanIni / $jumlahTransaksi : 0;

        // top user (sementara masih paginate user biasa)
        $topOmzet = User::paginate(10);

        // total omzet semua user (kayaknya sama dengan $totalOmzet, tapi gue biarin sesuai kode lo)
        $totalUserOmzet = Omzet::sum('total_omzets');

        return view('page.user.dashboard', compact(
            'totalOmzet',
            'topOmzet',
            'totalUserOmzet',
            'rataOmzet'
        ));
    }
}

