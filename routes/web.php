<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NoteController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/user', function () {
    return view('page.user.dashboard');
});

Route::get('/font-example', function () {
    return view('font-example');
})->name('font.example');

Route::get('/font-inter-example', function () {
    return view('font-inter-example');
})->name('font.inter.example');


Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/note/{product}', [NoteController::class, 'create'])->name('note');
Route::post('/note', [NoteController::class, 'store'])->name('note.store');


Route::get('/add/omzet', function () {
    return view('page.user.addOmzet');
})->name('addOmzet');

Route::get('/target', function () {
    return view('page.user.targetOmzet');
})->name('targetOmzet');

Route::get('/top', function () {
    return view('page.user.topRating');
})->name('topRating');


Route::get('/article-in', function () {
    return view('page.user.article-in');
})->name('article-in');

Route::get('/ebook', function () {
    return view('page.user.ebook');
})->name('ebook');

Route::get('/video', function () {
    return view('page.user.video');
})->name('video');

Route::get('/comission', function () {
    return view('page.user.comission');
})->name('comission');

Route::get('/setting', function () {
    return view('page.user.setting');
})->name('setting');

Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index'])->name('articles');
