<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OmzetController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\TopRatingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

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
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
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
Route::post('/add/omzet', [TargetController::class, 'store'])->name('target.store');


Route::get('/target', [TargetController::class, 'index'])->name('targetOmzet');

Route::get('/top', [TopRatingController::class, 'index'])->name('topRating');
Route::get('/top-rating', [App\Http\Controllers\TopRatingController::class, 'index'])->name('toprating.index');


Route::get('/article-in', function () {
    return view('page.user.article-in');
})->name('article-in');

Route::get('/ebook', [EbookController::class, 'index'])->name('ebook');

Route::get('/video', function () {
    return view('page.user.video');
})->name('video');

Route::middleware(['auth'])->group(function () {
    Route::get('/settings', [ProfileController::class, 'index'])->name('settings.index');
    Route::post('/settings', [ProfileController::class, 'update'])->name('settings.update');
});

Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/omzet', [OmzetController::class, 'index'])->name('omzet');
Route::get('/riwayat-omzet', [App\Http\Controllers\OmzetController::class, 'index']);

Route::get('/comission', [OmzetController::class, 'komisi'])->name('comission');
Route::get('/riwayat-komisi', [App\Http\Controllers\OmzetController::class, 'komisi']);
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        
        // Add more admin routes here
    });
});
