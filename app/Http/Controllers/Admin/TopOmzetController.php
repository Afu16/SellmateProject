<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TopOmzetController extends Controller
{
    public function index()
    {
        $omzets = User::where('role', 'user')
            ->withSum('omzets', 'total_omzets')
            ->orderByDesc('omzets_sum_total_omzets')
            ->paginate(10)
            ->through(function ($user) {

                $total = $user->omzets_sum_total_omzets ?? 0;

                // Tentukan grade
                if ($total >= 300000) {
                    $user->score = 'A';
                } elseif ($total >= 200000) {
                    $user->score = 'B';
                } elseif ($total >= 100000) {
                    $user->score = 'C';
                } else {
                    $user->score = 'D';
                }

                return $user;
            });

        return view('page.admin.topOmzet', compact('omzets'));
    }
}
