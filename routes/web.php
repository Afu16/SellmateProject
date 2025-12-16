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
use App\Http\Controllers\VideoController;
use App\Http\Controllers\Admin\UserTransactionsController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\TopOmzetController as AdminTopOmzetController;
use App\Http\Controllers\Admin\HistoryController;

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
Route::delete('/target/{id}', [TargetController::class, 'destroy'])->name('target.destroy');
Route::get('/target/{id}/edit', [TargetController::class, 'edit'])->name('target.edit');
Route::put('/target/{id}', [TargetController::class, 'update'])->name('target.update');

Route::get('/top', [TopRatingController::class, 'index'])->name('topRating');
Route::get('/top-rating', [App\Http\Controllers\TopRatingController::class, 'index'])->name('toprating.index');

Route::get('/ebook', [EbookController::class, 'index'])->name('ebook');
Route::get('/ebooks/filter', [EbookController::class, 'filter'])->name('ebooks.filter');
Route::get('/ebook/share/{id}', [EbookController::class, 'shareLink'])->name('ebook.share');

Route::get('/videos/upload', [VideoController::class, 'uploadForm'])->name('videos.upload.form');
Route::post('/videos/upload', [VideoController::class, 'uploadStore'])->name('videos.upload.store');

Route::get('/videos', [VideoController::class, 'index'])->name('videos');
Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');
Route::get('/video/share/{id}', [VideoController::class, 'shareLink'])->name('video.share');


Route::middleware(['auth'])->group(function () {
    Route::get('/settings', [ProfileController::class, 'index'])->name('settings.index');
    Route::put('/settings', [ProfileController::class, 'update'])->name('settings.update');
});

Route::get('/article-in', function () {return view('page.user.article-in');})->name('article-in');
Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/share/article/{token}', [ArticleController::class, 'showShared']);
Route::get('/articles/share/{id}', [ArticleController::class, 'share'])->name('articles.share');
Route::get('/share/article/{token}', [ArticleController::class, 'showShared'])->name('articles.shared');

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
        
        // User Management Routes
        Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
        Route::post('/users', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
        Route::get('/users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');

        Route::put('/users/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/usermana/{id}', [UserTransactionsController::class, 'index'])->name('usermana');
        Route::get('/usermana/{id}/data', [UserTransactionsController::class, 'data'])->name('usermana.data');

        // History Omzet Management Routes
Route::get('/histori-omzet', [HistoryController::class, 'index'])
    ->name('histori-omzet');
        
        
        // Product Management Routes
        Route::get('/products/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('products.create');
        Route::get('/products', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products');
        Route::post('/products', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products.store');
        Route::put('/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('products.destroy');
        
        // Omzet Management Routes
        Route::get('/omzet', [AdminTopOmzetController::class, 'index'])->name('topomzet');
        
        // Video Management Routes
        Route::get('/videos/create', [\App\Http\Controllers\Admin\VideoController::class, 'create'])->name('videos.create');
        Route::get('/videos', [\App\Http\Controllers\Admin\VideoController::class, 'index'])->name('videos');
        Route::post('/videos', [\App\Http\Controllers\Admin\VideoController::class, 'store'])->name('videos.store');
        Route::put('/videos/{id}', [\App\Http\Controllers\Admin\VideoController::class, 'update'])->name('videos.update');
        Route::delete('/videos/{id}', [\App\Http\Controllers\Admin\VideoController::class, 'destroy'])->name('videos.destroy');
        
        // Ebook Management Routes
        Route::get('/ebooks/create', [\App\Http\Controllers\Admin\EbookController::class, 'create'])->name('ebooks.create');
        Route::get('/ebooks', [\App\Http\Controllers\Admin\EbookController::class, 'index'])->name('ebooks');
        Route::post('/ebooks', [\App\Http\Controllers\Admin\EbookController::class, 'store'])->name('ebooks.store');
        Route::put('/ebooks/{id}', [\App\Http\Controllers\Admin\EbookController::class, 'update'])->name('ebooks.update');
        Route::delete('/ebooks/{id}', [\App\Http\Controllers\Admin\EbookController::class, 'destroy'])->name('ebooks.destroy');
        
        // Article Management Routes
        Route::get('/articles/create', [\App\Http\Controllers\Admin\ArticleController::class, 'create'])->name('articles.create');
        Route::get('/articles', [\App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('articles');
        Route::post('/articles', [\App\Http\Controllers\Admin\ArticleController::class, 'store'])->name('articles.store');
        Route::put('/articles/{id}', [\App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('articles.update');
        Route::delete('/articles/{id}', [\App\Http\Controllers\Admin\ArticleController::class, 'destroy'])->name('articles.destroy');
        
        // History Routes
        Route::get('/history', [\App\Http\Controllers\Admin\HistoryController::class, 'index'])->name('history');

    });
});


