<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omzet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OmzetController extends Controller
{
public function index(Request $request)
{
    $userId = Auth::id();

    // Ambil tanggal dari query (kalau ada)
    $selectedDate = $request->get('date');

    $query = Omzet::with('product')->where('user_id', $userId);

    // Filter kalau user pilih tanggal
    if ($selectedDate) {
        $query->whereDate('date', $selectedDate);
    }

    $omzetFiltered = $query->orderBy('date', 'desc')->get();

    // Total omzet keseluruhan user
    $totalOmzet = Omzet::where('user_id', $userId)->sum('total_omzets');

    // Total omzet bulan ini
    $omzetBulanIni = Omzet::with('product')
        ->where('user_id', $userId)
        ->whereMonth('date', now()->month)
        ->whereYear('date', now()->year)
        ->orderBy('date', 'desc')
        ->get();

    $totalBulanIni = $omzetBulanIni->sum('total_omzets');

    // Group per bulan (buat history)
    $perBulan = Omzet::selectRaw('YEAR(date) year, MONTH(date) month, SUM(total_omzets) total')
        ->where('user_id', $userId)
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();

    return view('page.user.omzet', compact(
        'totalOmzet',
        'omzetBulanIni',
        'totalBulanIni',
        'perBulan',
        'omzetFiltered',
        'selectedDate'
    ));
}

}
