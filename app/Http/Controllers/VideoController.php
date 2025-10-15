<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{


    public function index(Request $request)
    {
        $videos = \App\Models\Video::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('page.user.video', compact('videos'));
    }

    public function show(Video $video)
    {
        return view('page.user.video-in', compact('video'));
    }

    // public function destroy(Video $video)
    // {
    //     if ($video->user_id != auth()->id()) {
    //         abort(403);
    //     }
    //     $video->delete();
    //     return back()->with('success', 'Video dihapus.');
    // }

    public function uploadForm()
{
    return view('page.user.video-upload');
}

public function uploadStore(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'video_file' => 'required|file|mimes:mp4,mov,avi,webm|max:51200',
        'thumbnail' => 'nullable|image|max:4096',
        'duration' => 'nullable|string|max:16',
    ]);

    $videoPath = $request->file('video_file')->store('videos', 'public');
    $thumbnailPath = $request->hasFile('thumbnail')
        ? $request->file('thumbnail')->store('thumbnails', 'public')
        : null;

    \App\Models\Video::create([
       'user_id' => auth()->id(),
        'title' => $request->title,
        'category' => 'Lokal',
        'slug' => null,
        'description' => $request->description,
        'link' => $videoPath,
        'thumbnail' => $thumbnailPath,
        'duration' => $request->duration,
        'published_at' => now(),
    ]);

    return redirect()->route('videos')->with('success', 'Video lokal berhasil diupload!');
}

}
