<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Omzet;

class OmzetController extends Controller
{
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'product_id' => 'required|integer',
    //         'quantity' => 'required|integer|min:1',
    //         'total_omzets' => 'required|numeric',
    //     ]);

    //     Omzet::create([
    //         // 'user_id' => auth()->id(),
    //         'product_id' => $request->product_id,
    //         'quantity' => $request->quantity,
    //         'total_omzets' => $request->total_omzets
    //     ]);

    //     return redirect()->back()->with('success', 'Data omzet berhasil disimpan!');
    // }
}
