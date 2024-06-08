<?php

use App\Http\Controllers\AudioBookController;
use App\Http\Controllers\BeyondTheBookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    $categories = Category::all();
    return view('dashboard', compact('categories'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/addResources', [ResourceController::class, 'index'])->name('addResources.index');
        Route::get('/viewResources', [ResourceController::class, 'view'])->name('viewResources.index');
        Route::post('/addResources', [ResourceController::class, 'store'])->name('addResources.store');
        Route::post('/addCategories', [CategoryController::class, 'store'])->name('addCategories.store');
        Route::get('addCategories', [CategoryController::class, 'index'])->name('addCategories.index');
    });


    Route::get('/viewResources', [ResourceController::class, 'view'])->name('viewResources.index');
    Route::get('/ebook/view/{id}', [EbookController::class, 'view'])->name('ebook.view');
    Route::get('/audioBbook/view/{id}', [AudioBookController::class, 'view'])->name('audioBook.view');
    Route::get('/beyondTheBook/view/{id}', [BeyondTheBookController::class, 'view'])->name('beyondTheBook.view');
});


require __DIR__.'/auth.php';
