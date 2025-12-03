<?php

namespace App\Http\Controllers;

use App\Models\Target;
use App\Models\Omzet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TargetController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $targets = Target::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($target) use ($userId) {
        // Ambil total omzet user
        $totalOmzet = Omzet::where('user_id', $userId)->sum('total_omzets');

        // Hitung progres sederhana
        $progress = $target->target > 0
            ? min(100, ($totalOmzet / $target->target) * 100)
            : 0;

        // Tambahkan ke objek target
        $target->current_omzet = $totalOmzet;
        $target->progress = round($progress);
        $target->is_finished = $totalOmzet >= $target->target;

        return $target;
    });

        // Pisahkan target aktif dan riwayat (tanpa DB tambahan)
        $current = $targets->first(); // Target terbaru
        $history = collect(); // kumpulan target lama

        if ($targets->count() > 1) {
            $history = $targets->skip(1);
        }

        return view('page.user.targetOmzet', compact('current', 'history'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'timeline' => 'required|integer',
            'target' => 'required|integer'
        ]);

        $userId = $request->user()->id;

        // Ambil omzet total user
        $currentOmzet = Omzet::where('user_id', $userId)->sum('total_omzets');

        // Cek apakah target terakhir udah selesai, kalau belum maka target lama jadi riwayat "logik"
        $lastTarget = Target::where('user_id', $userId)->latest()->first();

        if ($lastTarget) {
            $progress = min(100, ($currentOmzet / $lastTarget->target) * 100);
            if ($progress < 100) {
                // Logika: target lama “dianggap selesai” karena bikin baru
                // tapi kita nggak ubah data di DB
            }
        }

        // Buat target baru
        Target::create([
            'user_id' => $userId,
            'title' => $request->title,
            'timeline' => $request->timeline,
            'target' => $request->target,
            'current_omzet' => 0,
        ]);

        if ($request->action === 'simpan') {
            return redirect()->route('dashboard')->with('success', 'Target omzet baru berhasil dibuat!');
        }

        return redirect()->route('targetOmzet')->with('success', 'Target omzet baru berhasil diubah!');
        }

    public function edit($id)
    {
        $target = Target::findOrFail($id);
        $currentOmzet = Omzet::where('user_id', Auth::id())->sum('total_omzets');

        // Cegah edit target yang sudah selesai
        if ($currentOmzet >= $target->target) {
            return redirect()->route('targetOmzet')->with('error', 'Target ini sudah selesai dan tidak bisa diedit.');
        }

        return view('page.user.addOmzet', compact('target'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'timeline' => 'required|integer',
            'target' => 'required|integer'
        ]);

        $target = Target::findOrFail($id);
        $currentOmzet = Omzet::where('user_id', Auth::id())->sum('total_omzets');

        if ($currentOmzet >= $target->target) {
            return redirect()->route('targetOmzet')->with('error', 'Target ini sudah selesai dan tidak bisa diubah.');
        }

        $target->update([
            'title' => $request->title,
            'timeline' => $request->timeline,
            'target' => $request->target,
        ]);

        if ($request->action === 'perbarui') {
            return redirect()->route('targetOmzet')->with('success', 'Target berhasil diperbarui!');
        }

        return redirect()->route('dashboard')->with('success', 'Target berhasil diperbarui!');
        }

    public function destroy($id)
    {
        $target = Target::findOrFail($id);
        $currentOmzet = Omzet::where('user_id', Auth::id())->sum('total_omzets');

        if ($currentOmzet >= $target->target) {
            return redirect()->back()->with('error', 'Target ini sudah selesai dan tidak bisa dihapus.');
        }

        $target->delete();

        return redirect()->back()->with('success', 'Target berhasil dihapus.');
    }
}
