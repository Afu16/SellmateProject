<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()
        ->paginate(10);
        return view('page.admin.article',compact('articles'));
    }
public function destroy($id)
    {
        $article = Article::findOrFail($id);
        Storage::delete('public/' . $article->thumbnail);
        $article->delete();

        return redirect()
            ->route('admin.articles')
            ->with('success', 'Article berhasil dihapus');
    }
    public function create()
    {
        return view('page.admin.article-add');
    }
}
