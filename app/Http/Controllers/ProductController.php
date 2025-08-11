<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::latest()->get(); // Ambil semua produk dari database
        // return view('page.user.product', compact('products'));
        $products = Product::all();
        return view('page.user.product', compact('products'));
    }
}
