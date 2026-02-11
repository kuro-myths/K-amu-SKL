<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminEducationController;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/explore', [ExploreController::class, 'index'])->name('explore');
Route::get('/categories', [ExploreController::class, 'categories'])->name('categories');
Route::get('/education/{education}', [ExploreController::class, 'show'])->name('education.show');

/*
|--------------------------------------------------------------------------
| Auth Routes (Login / Register / Logout)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| Social Auth Routes (Google & GitHub OAuth)
|--------------------------------------------------------------------------
*/

Route::get('/auth/{provider}/redirect', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Submit link
    Route::get('/submit', [DashboardController::class, 'submit'])->name('submit');
    Route::post('/submit', [DashboardController::class, 'store'])->name('submit.store');

    // Edit / Delete own links
    Route::get('/education/{education}/edit', [DashboardController::class, 'edit'])->name('education.edit');
    Route::put('/education/{education}', [DashboardController::class, 'update'])->name('education.update');
    Route::delete('/education/{education}', [DashboardController::class, 'destroy'])->name('education.destroy');

    // Bookmarks
    Route::get('/bookmarks', [DashboardController::class, 'bookmarks'])->name('bookmarks');
    Route::post('/bookmark/{education}', [DashboardController::class, 'toggleBookmark'])->name('bookmark.toggle');

    // Reviews
    Route::post('/education/{education}/review', [ReviewController::class, 'store'])->name('review.store');
    Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->name('review.destroy');

    // Profile
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Kelola Kategori
    Route::resource('categories', AdminCategoryController::class)->except('show');

    // Kelola Link Edukasi
    Route::get('/educations', [AdminEducationController::class, 'index'])->name('educations.index');
    Route::get('/educations/pending', [AdminEducationController::class, 'pending'])->name('educations.pending');
    Route::patch('/educations/{education}/approve', [AdminEducationController::class, 'approve'])->name('educations.approve');
    Route::patch('/educations/{education}/reject', [AdminEducationController::class, 'reject'])->name('educations.reject');
    Route::get('/educations/{education}/edit', [AdminEducationController::class, 'edit'])->name('educations.edit');
    Route::put('/educations/{education}', [AdminEducationController::class, 'update'])->name('educations.update');
    Route::delete('/educations/{education}', [AdminEducationController::class, 'destroy'])->name('educations.destroy');

    // Kelola User
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/toggle-role', [AdminUserController::class, 'toggleRole'])->name('users.toggle-role');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
});
