<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()
        ->paginate(10);


        return view('page.admin.product',compact('products'));
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/' . $product->thumbnail);

        $product->delete();

        return redirect()
            ->route('admin.products')
            ->with('success', 'Product berhasil dihapus');
    }

    public function create()
    {
        return view('page.admin.product-add');
    }
}
