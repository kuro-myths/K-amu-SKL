<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\JelajahController;
use App\Http\Controllers\DasborController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\AutentikasiSosialController;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\Admin\DasborAdminController;
use App\Http\Controllers\Admin\KategoriAdminController;
use App\Http\Controllers\Admin\EdukasiAdminController;
use App\Http\Controllers\Admin\PenggunaAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [BerandaController::class, 'index'])->name('landing');
Route::get('/explore', [JelajahController::class, 'index'])->name('explore');
Route::get('/categories', [JelajahController::class, 'categories'])->name('categories');
Route::get('/education/{education}', [JelajahController::class, 'show'])->name('education.show');

/*
|--------------------------------------------------------------------------
| Auth Routes (Login / Register / Logout)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AutentikasiController::class, 'showLogin'])->name('login');
    Route::post('/login', [AutentikasiController::class, 'login']);
    Route::get('/register', [AutentikasiController::class, 'showRegister'])->name('register');
    Route::post('/register', [AutentikasiController::class, 'register']);
});

Route::post('/logout', [AutentikasiController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| Social Auth Routes (Google & GitHub OAuth)
|--------------------------------------------------------------------------
*/

Route::get('/auth/{provider}/redirect', [AutentikasiSosialController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [AutentikasiSosialController::class, 'callback'])->name('social.callback');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DasborController::class, 'index'])->name('dashboard');

    // Submit link
    Route::get('/submit', [DasborController::class, 'submit'])->name('submit');
    Route::post('/submit', [DasborController::class, 'store'])->name('submit.store');

    // Edit / Delete own links
    Route::get('/education/{education}/edit', [DasborController::class, 'edit'])->name('education.edit');
    Route::put('/education/{education}', [DasborController::class, 'update'])->name('education.update');
    Route::delete('/education/{education}', [DasborController::class, 'destroy'])->name('education.destroy');

    // Bookmarks
    Route::get('/bookmarks', [DasborController::class, 'bookmarks'])->name('bookmarks');
    Route::post('/bookmark/{education}', [DasborController::class, 'toggleBookmark'])->name('bookmark.toggle');

    // Reviews
    Route::post('/education/{education}/review', [UlasanController::class, 'store'])->name('review.store');
    Route::delete('/review/{review}', [UlasanController::class, 'destroy'])->name('review.destroy');

    // Profile
    Route::get('/profile', [DasborController::class, 'profile'])->name('profile');
    Route::put('/profile', [DasborController::class, 'updateProfile'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/', [DasborAdminController::class, 'index'])->name('dashboard');

    // Kelola Kategori
    Route::resource('categories', KategoriAdminController::class)->except('show');

    // Kelola Link Edukasi
    Route::get('/educations', [EdukasiAdminController::class, 'index'])->name('educations.index');
    Route::get('/educations/pending', [EdukasiAdminController::class, 'pending'])->name('educations.pending');
    Route::patch('/educations/{education}/approve', [EdukasiAdminController::class, 'approve'])->name('educations.approve');
    Route::patch('/educations/{education}/reject', [EdukasiAdminController::class, 'reject'])->name('educations.reject');
    Route::patch('/educations/{education}/toggle-featured', [EdukasiAdminController::class, 'toggleFeatured'])->name('educations.toggle-featured');
    Route::get('/educations/{education}/edit', [EdukasiAdminController::class, 'edit'])->name('educations.edit');
    Route::put('/educations/{education}', [EdukasiAdminController::class, 'update'])->name('educations.update');
    Route::delete('/educations/{education}', [EdukasiAdminController::class, 'destroy'])->name('educations.destroy');

    // Kelola User
    Route::get('/users', [PenggunaAdminController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/toggle-role', [PenggunaAdminController::class, 'toggleRole'])->name('users.toggle-role');
    Route::delete('/users/{user}', [PenggunaAdminController::class, 'destroy'])->name('users.destroy');
});
