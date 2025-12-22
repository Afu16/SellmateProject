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

        $omzetBulanIni = $monthlyQuery->orderBy('date', 'desc')->get();
        $totalBulanIni = $omzetBulanIni->sum('total_omzets');

    // Jika tidak ada transaksi bulan ini
    if ($omzetBulanIni->isEmpty()) {
        $weeks = [];
        $weeksItems = [];
    } else {

        // Ambil tanggal transaksi pertama di bulan ini
        $firstDate = Carbon::parse($omzetBulanIni->first()->date);

        // Cari Senin pertama minggu transaksi pertama
        $firstMonday = $firstDate->copy()->startOfWeek(Carbon::MONDAY);

        $weeks = [];
        $weeksItems = [];
        
        foreach ($omzetBulanIni as $o) {
            $date = Carbon::parse($o->date);

            // Hitung index minggu (0 = minggu pertama)
            $weekIndex = floor($firstMonday->diffInDays($date) / 7) + 1;

            // Inisialisasi jika belum ada
            if (!isset($weeks[$weekIndex])) {
                $weeks[$weekIndex] = 0;
                $weeksItems[$weekIndex] = collect();
            }

            // Tambahkan omzet
            $weeks[$weekIndex] += (int) $o->total_omzets;
            $weeksItems[$weekIndex]->push($o);
        }
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
        $selectedMonth = $request->string('month')->toString();
        if (!$selectedMonth) {
            $selectedMonth = now()->format('Y-m');
        }
        $selectedProductId = $request->input('product_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $monthCarbon = Carbon::createFromFormat('Y-m', $selectedMonth)->startOfMonth();
        $year = (int) $monthCarbon->format('Y');
        $month = (int) $monthCarbon->format('m');

        // Total komisi keseluruhan user (tanpa filter)
        $allOmzets = Omzet::with('product')->where('user_id', $userId)->get();
        $totalKomisi = $allOmzets->sum(function ($o) {
            $qty = (float) ($o->quantity ?? 1);
            $price = (float) ($o->product->price ?? 0);
            $percent = (float) ($o->product->comission ?? 0);
            return $price * $qty * $percent;
        });

        // Query transaksi sesuai filter
        $query = Omzet::with('product')->where('user_id', $userId);

        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('date', [$startDate, $endDate]);
        } else {
            $query->whereYear('date', $year)->whereMonth('date', $month);
        }

        if (!empty($selectedProductId)) {
            $query->where('product_id', $selectedProductId);
        }

        $omzetBulanIni = $query->orderBy('date','desc')->get();

    // Hitung total komisi bulan ini
    $totalKomisiBulanIni = $omzetBulanIni->sum(function ($o) {
        $qty = (float) ($o->quantity ?? 1);
        $price = (float) ($o->product->price ?? 0);
        $percent = (float) ($o->product->comission ?? 0);
        return $price * $qty * $percent;
    });

    // Jika tidak ada transaksi bulan itu
    if ($omzetBulanIni->isEmpty()) {
        $weeks = [];
        $weeksItems = [];
    } else {

        // Ambil tanggal transaksi pertama
        $firstDate = Carbon::parse($omzetBulanIni->first()->date);

        // Cari Senin pertama minggu transaksi pertama
        $firstMonday = $firstDate->copy()->startOfWeek(Carbon::MONDAY);

    $weeks = [];
    $weeksItems = [];

    foreach ($omzetBulanIni as $o) {
        $date = Carbon::parse($o->date);
        $weekIndex = floor($firstMonday->diffInDays($date) / 7) + 1;

        if (!isset($weeks[$weekIndex])) {
            $weeks[$weekIndex] = 0;
            $weeksItems[$weekIndex] = collect();
        }

        $qty = (float) ($o->quantity ?? 1);
        $price = (float) ($o->product->price ?? 0);
        $percent = (float) ($o->product->comission ?? 0);

        $commission = $price * $qty * $percent;

        $weeks[$weekIndex] += $commission;
        $o->computed_commission = $commission;

        $weeksItems[$weekIndex]->push($o);
    }

        }

    return view('page.user.comission', [
        'totalKomisi' => $totalKomisi,
        'totalKomisiBulanIni' => $totalKomisiBulanIni,
        'weeks' => $weeks,
        'weeksItems' => $weeksItems,
        'selectedMonth' => $selectedMonth,
        'selectedProductId' => $selectedProductId,
    ]);

    }

}
