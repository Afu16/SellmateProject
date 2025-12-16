<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ebook;

class EbookController extends Controller
{
    public function index()
    {   
        $ebooks = Ebook::latest()
        ->paginate(10);
        return view('page.admin.ebook', compact('ebooks'));
    }
    public function create()
    {
        return view('page.admin.ebook-add');
    }
}
