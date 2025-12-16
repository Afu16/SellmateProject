<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Omzet;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HistoryController extends Controller
{
    public function index()
    {
    $omzets = Omzet::with('user')
        ->select(
            'user_id',
            DB::raw('SUM(total_omzets) as total_omzet'),
            DB::raw('MAX(date) as last_transaction')
        )
        ->groupBy('user_id')
            ->paginate(10);

        $totalOmzet = Omzet::sum('total_omzets');
        $totalTransaksi = Omzet::count();

        return view('page.admin.historyOmzet', compact(
            'omzets',
            'totalOmzet',
            'totalTransaksi'
        ));
        }
        public function detail(User $user)
        {
            $histories = Omzet::where('user_id', $user->id)
            ->orderByDesc('date') // 🔥 TERBARU DULU
            ->get();

        return view('page.admin.historyUser', compact(
            'user',
            'histories'
        ));
        }
}

