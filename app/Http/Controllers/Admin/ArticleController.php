<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()
        ->paginate(10);
        return view('page.admin.article',compact('articles'));
    }
    public function create()
    {
        return view('page.admin.article-add');
    }
}
