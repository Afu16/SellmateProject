<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get(); // Ambil semua artikel dari database
        return view('page.user.articles', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id); // Ambil data sesuai ID
        return view('page.user.article-in', compact('article'));
    }

    public function share($id)
    {
        $article = Article::findOrFail($id);

        // Kalau artikel dari luar (misal detik.com)
        if ($article->source_link) {
            $link = $article->source_link;
        } else {
            // Kalau artikel internal, generate token share unik
            if (!$article->share_token) {
                $article->share_token = Str::uuid();
                $article->save();
            }
            $link = url('/share/article/' . $article->share_token);
        }

        return response()->json(['link' => $link]);
    }

    public function showShared($token)
   {
    $article = Article::where('share_token', $token)->firstOrFail();

    // Pakai view yang sesuai folder lo
    return view('page.user.article-in', [
        'articles' => collect([$article]),
        'article'  => $article,
    ]);
    }

}

