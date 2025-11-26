<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function index()
    {   
        return view('page.admin.ebook');
    }
    public function create()
    {
        return view('page.admin.ebook-add');
    }
}
