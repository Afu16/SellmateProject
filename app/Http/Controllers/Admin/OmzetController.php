<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OmzetController extends Controller
{
    public function index()
    {
        return view('page.admin.topOmzet');
    }
}
