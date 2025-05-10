<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SenimanController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->Middleware('auth', 'role:admin')->name('dashboard');
Route::get('/notiffication', [AdminController::class, 'notif'])->Middleware('auth', 'role:admin')->name('notif');
Route::get('/gallery', [AdminController::class, 'galeri'])->Middleware('auth', 'role:admin')->name('galeri');
Route::get('/infouser', [AdminController::class, 'seniman'])->Middleware('auth', 'role:admin')->name('infouser');
Route::get('/profileuser', [AdminController::class, 'profil'])->Middleware('auth', 'role:admin')->name('profiluser');
Route::get('/validasiKarya', [AdminController::class, 'validasi'])->Middleware('auth', 'role:admin')->name('validasiKarya');

Route::get('/post', [SenimanController::class, 'upload'])->Middleware('auth', 'role:admin')->name('upload');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::middleware(['auth', 'role:seniman'])->group(function () {
    Route::get('/seniman/dashboard', [SenimanController::class, 'index'])->name('seniman.dashboard');
});

Route::middleware(['auth', 'role:konsumen'])->group(function () {
    Route::get('/konsumen/dashboard', [KonsumenController::class, 'index'])->name('konsumen.dashboard');
});
require __DIR__.'/auth.php';
