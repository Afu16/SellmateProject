<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::latest()
        ->paginate(10);


        return view('page.admin.product',compact('products'));
    }
    public function create()
    {
        return view('page.admin.product-add');
    }
}
