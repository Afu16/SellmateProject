<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Omzet;

class NoteController extends Controller
{
    public function create(Product $product)
    {
        return view('page.user.note', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'total_omzets' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Omzet::create([
            'user_id' => 1,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_omzets' => $request->total_omzets,
            'date' => $request->date ?? now()->format('Y-m-d'),
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Data omzet berhasil disimpan!');
    }
}