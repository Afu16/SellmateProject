<?php

namespace App\Http\Controllers;
use App\Models\Ebook;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::latest()->get(); // ambil semua ebook dari DB
        return view('page.user.ebook', compact('ebooks'));
    }

    // Simpan ebook baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'thumbnail' => 'nullable|image',
            'kategori' => 'required',
            'file_url' => 'required',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Ebook::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'thumbnail' => $thumbnailPath,
            'kategori' => $request->kategori,
            'file_url' => $request->file_url,
        ]);

        return redirect()->route('ebooks.index')->with('success', 'Ebook berhasil ditambahkan!');
    }
}
