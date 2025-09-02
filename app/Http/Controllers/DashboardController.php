<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omzet;
use App\Models\User;

class DashboardController extends Controller
{
        public function index()
    {
        // Ambil total omzet dari DB
        $totalOmzet = Omzet::sum('total_omzets');

        // Ambil top 5 omzet dari DB
        $topOmzet = User::paginate(10);

        // Ambil total omzet dari DB
        $totalUserOmzet = Omzet::sum('total_omzets');

        // Kirim ke dashboard
        return view('page.user.dashboard', compact('totalOmzet', 'topOmzet', 'totalUserOmzet'));
    }
}
