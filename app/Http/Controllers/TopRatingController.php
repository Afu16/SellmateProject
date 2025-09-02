<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TopRatingController extends Controller
{
    public function index()
    {
        $topRating = User::paginate(10);
        return view('page.user.topRating', compact('topRating'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('page.user.show', compact('user'));
    }
}
