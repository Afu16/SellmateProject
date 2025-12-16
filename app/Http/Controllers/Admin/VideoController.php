<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;    

class VideoController extends Controller
{
    public function index(Request $request)
    {
    $category = $request->get('category');
    $search   = $request->get('search');

    $videos = Video::query()
        ->when($category, function ($q) use ($category) {
            $q->where('category', $category);
        })
        ->when($search, function ($q) use ($search) {
            $q->where('slug', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('page.admin.video', compact('videos', 'category', 'search'));
    }

    public function create()
    {
        return view('page.admin.video-add');
    }
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        Storage::delete('public/' . $video->thumbnail);

        $video->delete();

        return redirect()
            ->route('admin.videos')
            ->with('success', 'Video berhasil dihapus');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required|url',
            'category' => 'required|in:inspirasi,tips',
            'thumbnail' => 'nullable|image',

            // validasi angka durasi
            'hour' => 'required|integer|min:0|max:99',
            'minute' => 'required|integer|min:0|max:59',
            'second' => 'required|integer|min:0|max:59',
        ]);

        // =========================
        // AMBIL VIDEO ID YOUTUBE
        // =========================
        preg_match(
            '/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([^\&\?\/]+)/',
            $request->link,
            $matches
        );

        $videoId = $matches[1] ?? null;

        if (!$videoId) {
            return back()->withErrors(['link' => 'Link YouTube tidak valid']);
        }

        // =========================
        // THUMBNAIL (tanpa API)
        // =========================
        if ($request->thumbnail_source === 'upload' && $request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('videos', 'public');
        } else {
            $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
            $imageContent = file_get_contents($thumbnailUrl);

            $thumbnailPath = 'videos/' . uniqid() . '.jpg';
            Storage::disk('public')->put($thumbnailPath, $imageContent);
        }

        // =========================
        // FORMAT DURASI HH:MM:SS
        // =========================
        $duration = sprintf(
            '%02d:%02d:%02d',
            $request->hour,
            $request->minute,
            $request->second
        );

        Video::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'link' => $request->link,
            'category' => $request->category,
            'duration' => $duration,
            'published_at' => $request->published_at,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()
            ->route('admin.videos')
            ->with('success', 'Video berhasil ditambahkan');
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('page.admin.video-add', compact('video'));
    }

    public function update(Request $request, Video $video)
{
    $request->validate([
        'title' => 'required',
        'link' => 'required|url',
        'category' => 'required|in:inspirasi,tips',
        'hour' => 'required|integer|min:0|max:99',
        'minute' => 'required|integer|min:0|max:59',
        'second' => 'required|integer|min:0|max:59',
        'thumbnail' => 'nullable|image',
    ]);

    // ambil video ID youtube
    preg_match(
        '/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([^\&\?\/]+)/',
        $request->link,
        $matches
    );

    $videoId = $matches[1] ?? null;

    if (!$videoId) {
        return back()->withErrors(['link' => 'Link YouTube tidak valid']);
    }

    // thumbnail
    if ($request->thumbnail_source === 'upload' && $request->hasFile('thumbnail')) {
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }
        $thumbnailPath = $request->file('thumbnail')->store('videos', 'public');
    } else {
        $thumbnailPath = $video->thumbnail; // pakai lama
    }

    $duration = sprintf(
        '%02d:%02d:%02d',
        $request->hour,
        $request->minute,
        $request->second
    );

    $video->update([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->description,
        'link' => $request->link,
        'category' => $request->category,
        'duration' => $duration,
        'published_at' => $request->published_at,
        'thumbnail' => $thumbnailPath,
    ]);

    return redirect()
        ->route('admin.videos')
        ->with('success', 'Video berhasil diperbarui');
}

}
