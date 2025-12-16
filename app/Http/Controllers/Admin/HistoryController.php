<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Omzet;

class HistoryController extends Controller
{
    public function index()
    {
        $omzets = Omzet::with(['user', 'product'])
            ->latest('date')
            ->get();

        $totalOmzet = Omzet::sum('total_omzets');
        $totalTransaksi = Omzet::count();

        return view('page.admin.historyOmzet', compact(
            'omzets',
            'totalOmzet',
            'totalTransaksi'
        ));
    }
}

