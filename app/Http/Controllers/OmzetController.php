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
        // $omzetBulanIni = Omzet::whereMonth('date', Carbon::now()->month)
        //     ->whereYear('date', Carbon::now()->year)
        //     ->orderBy('date', 'desc') 
        //     ->get();
        $omzetBulanIni = Omzet::with('product')
        ->whereMonth('date', now()->month)
        ->whereYear('date', now()->year)
        ->orderBy('date', 'desc') 
        ->get();

        $totalBulanIni = $omzetBulanIni->sum('total_omzets');

        // group per bulan (buat history)
        $perBulan = Omzet::selectRaw('YEAR(date) year, MONTH(date) month, SUM(total_omzets) total')
            ->groupBy('year','month')
            ->orderBy('year','desc')
            ->orderBy('month','desc')
            ->get();

        return view('page.user.omzet', compact('totalOmzet','omzetBulanIni','totalBulanIni','perBulan'));
    }

    public function komisi()
    {
        // ambil semua omzet dengan relasi produk
        $riwayatKomisi = Omzet::with('product')
            ->orderBy('date', 'desc')
            ->get()
            ->map(function ($o) {
                // ambil rate dari kolom comission di tabel products
                $rate = $o->product->comission ?? 0;
                $o->komisi_didapat = $o->total_omzets * $rate;
                return $o;
            });

        // total semua komisi dihitung dari semua record
        $totalKomisi = $riwayatKomisi->sum('komisi_didapat');

        return view('page.user.comission', compact('totalKomisi', 'riwayatKomisi'));
    }

}
