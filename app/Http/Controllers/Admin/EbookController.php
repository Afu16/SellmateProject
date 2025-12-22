<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ebook;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    public function index()
    {   
        $ebooks = Ebook::latest()
        ->paginate(10);
        return view('page.admin.ebook', compact('ebooks'));
    }
    public function destroy($id)
    {
        $ebook = Ebook::findOrFail($id);
        Storage::delete('public/' . $ebook->thumbnail);

        $ebook->delete();

        return redirect()
            ->route('admin.ebooks')
            ->with('success', 'Ebook berhasil dihapus');
    }
    public function create()
    {
        return view('page.admin.ebook-add');
    }
}
