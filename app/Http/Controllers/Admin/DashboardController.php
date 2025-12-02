<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Omzet;
use App\Models\Target;
use App\Models\User;
use App\Models\Product;
use App\Models\Video;
use App\Models\Ebook;
use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalOmzet = Omzet::sum('total_omzets');

        $totalUser = User::where('role', 'user')->count();

        $totalProduct = Product::count();
        $totalVideo = Video::count();
        $totalEbook = Ebook::count();
        $totalArticle = Article::count();

        $topOmzet = User::where('role', 'user')
            ->withSum('omzets', 'total_omzets')
            ->orderByDesc('omzets_sum_total_omzets')
            ->take(10)
            ->get();

        $history = Omzet::with('user')
            ->orderBy('date', 'desc')
            ->take(11)
            ->get();

        return inertia('Admin/Dashboard', [
            'totalOmzet'     => $totalOmzet,
            'totalUser'      => $totalUser,
            'totalProduct'   => $totalProduct,
            'totalVideo'     => $totalVideo,
            'totalEbook'     => $totalEbook,
            'totalArticle'   => $totalArticle,
            'topOmzet'       => $topOmzet,
            'history'        => $history,
        ]);
    }

}
