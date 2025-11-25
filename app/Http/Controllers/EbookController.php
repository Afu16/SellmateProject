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

    public function filter(Request $request)
    {
        $search = $request->get('search');
        $kategori = $request->get('kategori');

        $query = Ebook::query();

        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $ebooks = $query->latest()->get();

        // balikin HTML biar langsung diganti di tampilan
        $html = '';
        foreach ($ebooks as $ebook) {
            $html .= '
            <div class="relative rounded-xl w-[100vw] overflow-hidden shadow-md bg-gray-900">
                <img src="' . asset($ebook->thumbnail) . '" alt="' . e($ebook->title) . '" class="w-full h-64 object-cover opacity-70">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-4 w-full">
                    <div class="flex">
                        <div>
                            <h2 class="text-white font-semibold text-base mb-1">' . e($ebook->title) . '</h2>
                            <p class="text-white text-xs leading-tight line-clamp-2">' . e($ebook->description) . '</p>
                            <span class="text-xs bg-white/80 text-gray-800 px-2 py-1 rounded">' . e($ebook->kategori) . '</span>
                        </div>
                        <div class="mt-[5vh] ml-auto">
                            <a href="' . e($ebook->file_url) . '" target="_blank" class="w-6 h-6 inline-block">
                                <svg class="w-full h-full text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>';
        }

        return response()->json(['html' => $html]);
    }
    
    public function share($slug)
    {
        $ebook = Ebook::where('slug', $slug)->firstOrFail();

        // Arahkan langsung ke file PDF di storage
        return redirect(asset('storage/' . $ebook->file_url));
    }

}
