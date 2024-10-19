<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::get('/obras', [WorkController::class, 'index'])->name('obras.index');
Route::post('/obras', [WorkController::class, 'store'])->name('obras.store');
Route::get('/obras/create', [WorkController::class, 'create'])->name('obras.create');
Route::delete('/obras/{obra}', [WorkController::class, 'destroy'])->name('obras.destroy');
Route::put('/obras/{obra}', [WorkController::class, 'update'])->name('obras.update');
Route::get('/obras/{obra}/edit', [WorkController::class, 'edit'])->name('obras.edit');
});

require __DIR__.'/auth.php';
