<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StorefrontController; // Pastikan ini ada
use Illuminate\Support\Facades\Route;

// 1. Rute Halaman Depan Publik (Memanggil data produk)
Route::get('/', [StorefrontController::class, 'index'])->name('home');

// 2. Rute Dashboard Admin
Route::get('/dashboard', function () {
    $totalProducts = \App\Models\Product::count();
    $totalCategories = \App\Models\Category::count();
    $totalTags = \App\Models\Tag::count();

    return view('dashboard', compact('totalProducts', 'totalCategories', 'totalTags'));
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. Rute Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 4. Rute CRUD Produk untuk Admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('admin/products', ProductController::class);
});

require __DIR__.'/auth.php';