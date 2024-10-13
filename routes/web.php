<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Subscribe\StoreController;
use App\Http\Controllers\Subscribe\CreateController;

Route::get('/', [ProductsController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('subscribe')
        ->as('subscribe.')
        ->group(function () {
            Route::get('create', CreateController::class)->name('create');
            Route::post('store', StoreController::class)->name('store');
        });
    });

require __DIR__.'/auth.php';
