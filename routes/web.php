<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\SenimanController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\KonsumenProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dash', function () {
    return view('dash');
});

// Route::get('/tes-pesan', function () {
//     return redirect()->route('konsumenProduk')->with('warning', 'Coba pesan warning muncul ya!');
// });


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/tampiladmin', [AdminController::class, 'admin'])->name('admin');
    Route::get('/validasiKarya', [AdminController::class, 'validasi'])->name('validasiKarya');
    Route::put('/karya/{id}/approve', [KaryaController::class, 'approve'])->name('karya.approve');
    Route::put('/karya/{id}/reject', [KaryaController::class, 'reject'])->name('karya.reject');
    Route::get('/gallery', [AdminController::class, 'galeri'])->name('galeri');
    Route::get('/infouser', [AdminController::class, 'seniman'])->name('infouser');
    Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    Route::delete('/karya/{id}', [KaryaController::class, 'destroy'])->name('karyas.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:seniman'])->prefix('seniman')->group(function () {
    Route::get('/tampilseniman', [SenimanController::class, 'dashboard'])->name('seniman');
    Route::get('/karya/upload', [KaryaController::class, 'upload'])->name('seniman.upload');
    Route::get('/karya/create', [KaryaController::class, 'create'])->name('seniman.karya.create');
    Route::post('/karya', [KaryaController::class, 'store'])->name('seniman.karya.store');
    Route::get('/seniman/karya', [KaryaController::class, 'indexSeniman'])->name('karya.seniman');
    Route::get('/seniman/orders', [SenimanController::class, 'tampilOrderSeniman'])->name('orders.seniman');
    Route::put('/order/{order}/complete', [OrderController::class, 'complete'])->name('order.complete');
    Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::delete('/karya/{id}', [KaryaController::class, 'destroy'])->name('karya.destroy');
});

Route::middleware(['auth', 'role:konsumen'])->group(function () {
    Route::get('/profil/{id}', [KonsumenController::class, 'showSeniman'])->name('seniman.show');
    Route::get('/tampil', [KonsumenController::class, 'dashboardKonsumen'])->name('tampilan');
    Route::get('/konsumenProduk', [KaryaController::class, 'lihatProduk'])->name('konsumenProduk');
    Route::get('/orderku', [OrderController::class, 'keranjang'])->name('keranjang');
    Route::put('/orderku/{order}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');
    Route::get('/profil', [KonsumenProfileController::class, 'edit'])->name('profil.edit');
    Route::patch('/profil', [KonsumenProfileController::class, 'update'])->name('profil.update');
    Route::delete('/profil', [KonsumenProfileController::class, 'destroy'])->name('profil.destroy');
    Route::post('/order/{karya}', [OrderController::class, 'store'])->name('order.store');
});
require __DIR__ . '/auth.php';
