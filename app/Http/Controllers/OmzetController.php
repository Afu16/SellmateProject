<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omzet;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OmzetController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        // Filters
        $selectedMonth = $request->string('month')->toString(); // format: YYYY-MM
        if (!$selectedMonth) {
            $selectedMonth = now()->format('Y-m');
        }
        $selectedProductId = $request->input('product_id');
        $startDate = $request->input('start_date'); // YYYY-MM-DD
        $endDate = $request->input('end_date');     // YYYY-MM-DD

        $monthCarbon = Carbon::createFromFormat('Y-m', $selectedMonth)->startOfMonth();
        $year = (int) $monthCarbon->format('Y');
        $month = (int) $monthCarbon->format('m');

        // Total omzet keseluruhan user (tanpa filter)
        $totalOmzet = Omzet::where('user_id', $userId)->sum('total_omzets');

        // Ambil transaksi sesuai filter rentang tanggal jika tersedia,
        // jika tidak, gunakan bulan terpilih. Opsional filter produk.
        $monthlyQuery = Omzet::with('product')
            ->where('user_id', $userId);

        if (!empty($startDate) && !empty($endDate)) {
            $monthlyQuery->whereBetween('date', [$startDate, $endDate]);
        } else {
            $monthlyQuery->whereYear('date', $year)
                ->whereMonth('date', $month);
        }

        if (!empty($selectedProductId)) {
            $monthlyQuery->where('product_id', $selectedProductId);
        }

        $omzetBulanIni = $monthlyQuery->orderBy('date', 'asc')->get();
        $totalBulanIni = $omzetBulanIni->sum('total_omzets');

        // Hitung agregasi per minggu (Minggu 1-4: 1-7, 8-14, 15-21, 22-akhir)
        $weeks = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
        ];
        $weeksItems = [
            1 => collect(),
            2 => collect(),
            3 => collect(),
            4 => collect(),
        ];

        foreach ($omzetBulanIni as $o) {
            $day = Carbon::parse($o->date)->day;
            $weekBucket = 1;
            if ($day >= 22) {
                $weekBucket = 4;
            } elseif ($day >= 15) {
                $weekBucket = 3;
            } elseif ($day >= 8) {
                $weekBucket = 2;
            }
            $weeks[$weekBucket] += (int) $o->total_omzets;
            $weeksItems[$weekBucket]->push($o);
        }

        // Produk untuk dropdown filter
        $products = Product::orderBy('name')->get();

        return view('page.user.omzet', [
            'totalOmzet' => $totalOmzet,
            'totalBulanIni' => $totalBulanIni,
            'weeks' => $weeks,
            'weeksItems' => $weeksItems,
            'selectedMonth' => $selectedMonth,
            'selectedProductId' => $selectedProductId,
            'products' => $products,
        ]);
    }

    public function komisi(Request $request)
    {
        $userId = Auth::id();

        // Filters
        $selectedMonth = $request->string('month')->toString(); // YYYY-MM
        if (!$selectedMonth) {
            $selectedMonth = now()->format('Y-m');
        }
        $selectedProductId = $request->input('product_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $monthCarbon = Carbon::createFromFormat('Y-m', $selectedMonth)->startOfMonth();
        $year = (int) $monthCarbon->format('Y');
        $month = (int) $monthCarbon->format('m');

        // Ambil semua Omzet user (untuk total komisi keseluruhan) dan hitung berdasarkan product.price * omzet.quantity * product.comission(decimal)
        $allOmzets = Omzet::with('product')->where('user_id', $userId)->get();
        $totalKomisi = $allOmzets->sum(function ($o) {
            $qty = (float) ($o->quantity ?? 1);
            $price = (float) ($o->product->price ?? 0);
            // product migration menyimpan komisi dalam bentuk decimal (mis. 0.05 untuk 5%)
            $percent = (float) ($o->product->comission ?? 0);
            $computed = $price * $qty * $percent;
            return $computed;
        });
        
        // Query transaksi sesuai rentang atau bulan (untuk tampilan bulan ini)
        $query = Omzet::with('product')->where('user_id', $userId);
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('date', [$startDate, $endDate]);
        } else {
            $query->whereYear('date', $year)->whereMonth('date', $month);
        }
        if (!empty($selectedProductId)) {
            $query->where('product_id', $selectedProductId);
        }

        $komisiBulanIni = $query->orderBy('date', 'asc')->get();

        // Hitung komisi per item dan total bulan ini (gunakan omzets.quantity dan product.price & product.comission)
        $totalKomisiBulanIni = 0;
        foreach ($komisiBulanIni as $o) {
            $qty = (float) ($o->quantity ?? 1);
            $price = (float) ($o->product->price ?? 0);
            // product->comission adalah decimal (mis. 0.05)
            $percent = (float) ($o->product->comission ?? 0);
            $computed = $price * $qty * $percent;

            // lampirkan atribut agar view bisa menampilkan rincian
            $o->computed_commission = $computed;
            $o->product_price = $price;
            $o->product_qty = $qty;
            $o->commission_percent = $percent;

            $totalKomisiBulanIni += $computed;
        }

        // Aggregasi per minggu berdasarkan computed_commission
        $weeks = [1=>0,2=>0,3=>0,4=>0];
        $weeksItems = [1=>collect(),2=>collect(),3=>collect(),4=>collect()];
        foreach ($komisiBulanIni as $o) {
            $day = Carbon::parse($o->date)->day;
            $bucket = 1;
            if ($day >= 22) $bucket = 4; elseif ($day >= 15) $bucket = 3; elseif ($day >= 8) $bucket = 2;
            $weeks[$bucket] += (float)($o->computed_commission ?? 0);
            $weeksItems[$bucket]->push($o);
        }

        $products = Product::orderBy('name')->get();

        return view('page.user.comission', [
            'totalKomisi' => $totalKomisi,
            'totalKomisiBulanIni' => $totalKomisiBulanIni,
            'weeks' => $weeks,
            'weeksItems' => $weeksItems,
            'selectedMonth' => $selectedMonth,
            'selectedProductId' => $selectedProductId,
            'products' => $products,
        ]);
    }
}
