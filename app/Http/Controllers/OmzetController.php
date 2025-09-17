<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omzet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OmzetController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // total omzet user ini
        $totalOmzet = Omzet::where('user_id', $userId)->sum('total_omzets');

        // omzet bulan ini
        $omzetBulanIni = Omzet::with('product')
            ->where('user_id', $userId)
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->orderBy('date', 'desc') 
            ->get();

        $totalBulanIni = $omzetBulanIni->sum('total_omzets');

        // group per bulan (buat history)
        $perBulan = Omzet::selectRaw('YEAR(date) year, MONTH(date) month, SUM(total_omzets) total')
            ->where('user_id', $userId)
            ->groupBy('year','month')
            ->orderBy('year','desc')
            ->orderBy('month','desc')
            ->get();

        return view('page.user.omzet', compact('totalOmzet','omzetBulanIni','totalBulanIni','perBulan'));
    }

    public function komisi()
    {
        $userId = Auth::id();

        // ambil semua omzet user ini dengan relasi produk
        $riwayatKomisi = Omzet::with('product')
            ->where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->get()
            ->map(function ($o) {
                $rate = $o->product->comission ?? 0;
                $o->komisi_didapat = $o->total_omzets * $rate;
                return $o;
            });

        // total komisi user ini
        $totalKomisi = $riwayatKomisi->sum('komisi_didapat');

        return view('page.user.comission', compact('totalKomisi', 'riwayatKomisi'));
    }
}
