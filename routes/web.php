<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    $portfolioItems = \App\Models\PortfolioItem::orderBy('sort_order')->get();
    return view('welcome', compact('portfolioItems'));
})->name('home');

Route::get('/gallery', function () {
    $galleryItems = \App\Models\GalleryItem::orderBy('sort_order')->get();
    return view('gallery', compact('galleryItems'));
})->name('gallery');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [\App\Http\Controllers\AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [\App\Http\Controllers\AdminAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth')->name('admin.')->group(function () {
        Route::post('/logout', [\App\Http\Controllers\AdminAuthController::class, 'logout'])->name('logout');
        
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
        
        Route::get('/gallery', [\App\Http\Controllers\AdminController::class, 'gallery'])->name('gallery.index');
        Route::post('/gallery', [\App\Http\Controllers\AdminController::class, 'storeGallery'])->name('gallery.store');
        Route::post('/gallery/{id}/delete', [\App\Http\Controllers\AdminController::class, 'deleteGallery'])->name('gallery.delete');
        
        Route::get('/portfolio', [\App\Http\Controllers\AdminController::class, 'portfolio'])->name('portfolio.index');
        Route::post('/portfolio', [\App\Http\Controllers\AdminController::class, 'storePortfolio'])->name('portfolio.store');
        Route::post('/portfolio/{id}/delete', [\App\Http\Controllers\AdminController::class, 'deletePortfolio'])->name('portfolio.delete');
        
        Route::get('/submissions', [\App\Http\Controllers\AdminController::class, 'submissions'])->name('submissions.index');
    });
});
