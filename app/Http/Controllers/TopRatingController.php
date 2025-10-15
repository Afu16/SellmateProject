<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TopRatingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');

        $query = User::withSum('omzets', 'total_omzets')
            ->when($search, function ($q, $search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('major', 'like', "%{$search}%");
            });

        // 🔥 Filter berdasarkan waktu
        $query->when($filter, function ($q, $filter) {
            if ($filter === 'bulan_ini') {
                $q->whereHas('omzets', function ($omzet) {
                    $omzet->whereMonth('created_at', now()->month)
                        ->whereYear('created_at', now()->year);
                });
            } elseif ($filter === 'bulan_lalu') {
                $q->whereHas('omzets', function ($omzet) {
                    $omzet->whereMonth('created_at', now()->subMonth()->month)
                        ->whereYear('created_at', now()->subMonth()->year);
                });
            } elseif ($filter === 'tahun_ini') {
                $q->whereHas('omzets', function ($omzet) {
                    $omzet->whereYear('created_at', now()->year);
                });
            }
        });

        $topRating = $query->paginate(10);

        return view('page.user.topRating', compact('topRating'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('page.user.show', compact('user'));
    }
}
