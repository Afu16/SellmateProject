<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TopRatingController extends Controller
{
    public function index()
    {
        // Ambil semua user + total omzet mereka
        $topRating = User::withSum('omzets', 'total_omzets')
            ->paginate(10);

        return view('page.user.topRating', compact('topRating'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('page.user.show', compact('user'));
    }
}
