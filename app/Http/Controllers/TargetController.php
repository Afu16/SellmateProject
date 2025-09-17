<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;
use App\Models\Omzet;
use Illuminate\Support\Facades\Auth;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $userId = Auth::id();

    $targets = Target::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get()
        ->map(function ($target) use ($userId) {
            // jumlah omzet untuk user
            $currentOmzet = \App\Models\Omzet::where('user_id', $userId)->sum('total_omzets');

            // hitung persen progress
            $progress = $target->target > 0 
                ? min(100, ($currentOmzet / $target->target) * 100) 
                : 0;

            // tambahin data ke objek target
            $target->current_omzet = $currentOmzet;
            $target->progress = round($progress);

            return $target;
        });

    return view('page.user.targetOmzet', compact('targets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
        'title' => 'required|string|max:255',
        'timeline' => 'required|integer',
        'target' => 'required|integer'
    ]);

        Target::create([
        'user_id' => $request->user()->id,
        'title' => $request->title,
        'timeline' => $request->timeline,
        'target' => $request->target
    ]);

    return redirect()->route('dashboard')
                     ->with('success', 'Target omzet berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Target $target)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Target $target)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Target $target)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Target $target)
    {
        //
    }
}
