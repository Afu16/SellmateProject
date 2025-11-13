<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Omzet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopRatingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');
        $monthYear = $request->input('month_year');
        $isAjax = $request->boolean('ajax') || $request->wantsJson() || $request->ajax();

        // Jika diminta JSON untuk dashboard dynamic, kembalikan top list sebagai JSON
        if ($isAjax && $monthYear && preg_match('/^\d{4}-\d{2}$/', $monthYear)) {
            [$year, $month] = explode('-', $monthYear);

            // ambil top 10 user berdasarkan sum(total_omzets) pada bulan yang dipilih
            $rows = DB::table('omzets')
                ->select('user_id', DB::raw('SUM(total_omzets) as total'))
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->groupBy('user_id')
                ->orderByDesc('total')
                ->limit(10)
                ->get();

            $userIds = $rows->pluck('user_id')->all();
            $users = User::whereIn('id', $userIds)->get()->keyBy('id');

            $result = [];
            foreach ($rows as $r) {
                $u = $users->get($r->user_id);
                if ($u) {
                    $result[] = [
                        'id' => $u->id,
                        'name' => $u->name,
                        'major' => $u->major,
                        'foto_link' => $u->foto_link,
                        'total' => (int) $r->total,
                    ];
                }
            }

            return response()->json(['top' => $result]);
        }

        // fallback: existing behavior (view) - tetap dukung month_year filtering via whereHas
$query = User::withSum(['omzets as omzets_sum_total_omzets' => function ($q) use ($monthYear) {
        if (!empty($monthYear) && preg_match('/^\d{4}-\d{2}$/', $monthYear)) {
            [$year, $month] = explode('-', $monthYear);
            $q->whereYear('date', $year)->whereMonth('date', $month);
        } else {
            $q->whereYear('date', now()->year)->whereMonth('date', now()->month);
        }
    }], 'total_omzets')
    ->where('role', 'user')
    ->when($search, function ($q, $search) {
        $q->where('name', 'like', "%{$search}%")
          ->orWhere('major', 'like', "%{$search}%");
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
