<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omzet;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // $userId = auth()->id();
        $userId = 1;

        // total omzet semua waktu (user ini)
        $totalOmzet = Omzet::where('user_id', $userId)->sum('total_omzets');

        // total omzet bulan ini (user ini)
        $totalOmzetBulanIni = Omzet::where('user_id', $userId)
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->sum('total_omzets');

        // semua transaksi bulan ini (user ini)
        $omzetBulanIni = Omzet::where('user_id', $userId)
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->get();

        // hitung rata-rata omzet bulan ini (user ini)
        $jumlahTransaksi = $omzetBulanIni->count();
        $rataOmzet = $jumlahTransaksi > 0 ? $totalOmzetBulanIni / $jumlahTransaksi : 0;

        // Top omzet per user (leaderboard semua user)
        $topOmzet = User::withSum('omzets', 'total_omzets')
            ->orderByDesc('omzets_sum_total_omzets')
            ->take(10)
            ->get();

        return view('page.user.dashboard', compact(
            'totalOmzet',
            'topOmzet',
            'rataOmzet'
        ));
    }
}
