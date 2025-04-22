<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\SocialMediaController;

// Public routes
Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/portfolio', [LandingPageController::class, 'portfolioIndex'])->name('portfolio.index');
Route::get('/portfolio/{portfolio}', [LandingPageController::class, 'showPortfolio'])->name('portfolio.show');
Route::get('/blog', [LandingPageController::class, 'blogIndex'])->name('blog.index');
Route::get('/blog/{blog}', [LandingPageController::class, 'showBlog'])->name('blog.show');

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('profile', ProfileController::class);
    Route::resource('portfolio', PortfolioController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('social-media', SocialMediaController::class);

});
