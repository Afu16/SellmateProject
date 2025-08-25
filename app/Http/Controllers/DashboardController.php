<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omzet;

class DashboardController extends Controller
{
        public function index()
    {
        // Ambil total omzet dari DB
        $totalOmzet = Omzet::sum('total_omzets');

        // Kirim ke dashboard
        return view('page.user.dashboard', compact('totalOmzet'));
    }
}
