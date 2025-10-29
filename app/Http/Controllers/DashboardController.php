<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omzet;
use App\Models\User;
use App\Models\Target;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        // Fallback untuk testing jika auth tidak tersedia
        if (!$userId) {
            $userId = 1;
        }

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
            ->where('role', 'user')
            ->orderByDesc('omzets_sum_total_omzets')
            ->take(10)
            ->get();

        $target = Target::where('user_id', $userId)->latest()->first();

        $progress = 0;
        $targetValue = 0;

        if ($target) {
            $targetValue = $target->target;
            $progress = $targetValue > 0 ? min(100, ($totalOmzet / $targetValue) * 100) : 0;
        }    
           
        return Inertia::render('Dashboard', compact(
            'totalOmzet',
            'topOmzet',
            'rataOmzet',
            'progress',
            'targetValue'
        ));
    }
}
