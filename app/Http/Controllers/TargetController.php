<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // 'user_id' => auth()->id(),
        'user_id' => 1, // Ganti dengan ID user yang sesuai
        'title' => $request->title,
        'timeline' => $request->timeline,
        'target' => $request->target
    ]);

    return redirect('/add/omzet')->with('success', 'Target omzet berhasil ditambahkan!');
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
