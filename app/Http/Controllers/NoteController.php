<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class NoteController extends Controller
{
    public function create(Product $product)
    {
        return view('page.user.note', compact('product'));
    }
}