<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{


    public function index(Request $request)
    {
        
    $filter = $request->get('filter');

    $videos = Video::with('user')
        ->when($filter, function($q) use ($filter) {
            $q->where('category', ucfirst($filter)); // Samakan format
        })
        ->orderBy('created_at', 'desc')
        ->get();

    return view('page.user.video', compact('videos'));
    }

    public function show(Video $video)
    {
        return view('page.user.video-in', compact('video'));
    }
        public function uploadForm()
    {
        return view('page.user.video-upload');
    }

         public function shareLink($id)
    {
        $ebook = Video::findOrFail($id);

        return response()->json([
            'link' => $ebook->link,
        ]);
    }

}
