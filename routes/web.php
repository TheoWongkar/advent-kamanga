<?php

use App\Http\Controllers\CongregationController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorshipController;
use App\Http\Controllers\WorshipRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/tentang-kami', function () {
    return view('about');
});

Route::get('/berita', [PostController::class, 'index']);
Route::get('/ibadah', [WorshipController::class, 'index']);
Route::get('/jemaat', [CongregationController::class, 'index']);
Route::get('/ajukan-ibadah', [WorshipRequestController::class, 'index']);
Route::post('/ajukan-ibadah', [WorshipRequestController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
