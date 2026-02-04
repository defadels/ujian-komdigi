<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\CategoryIndex;
use App\Livewire\Admin\ServiceIndex;
use App\Livewire\Admin\CarouselIndex;

use App\Livewire\Public\Home;
use App\Livewire\Public\CategoryServices;
use App\Livewire\Public\ServiceDetail;

Route::get('/', Home::class)->name('public.home');
Route::get('/kategori/{id}', CategoryServices::class)->name('public.category.services');
Route::get('/layanan/{id}', ServiceDetail::class)->name('public.service.detail');
Route::view('/tentang-kami', 'about')->name('about');
Route::view('/hubungi-kami', 'contact')->name('contact');

// Socialite Routes
Route::get('/oauth/google', [App\Http\Controllers\Auth\SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/oauth/google/callback', [App\Http\Controllers\Auth\SocialiteController::class, 'handleGoogleCallback']);


use App\Livewire\Admin\DashboardIndex;
use App\Livewire\Admin\UserIndex;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');

    Route::view('profile', 'profile')->name('profile');

    // Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', DashboardIndex::class)->name('admin.dashboard');
        Route::get('/admin/kategori-layanan', CategoryIndex::class)->name('admin.categories');
        Route::get('/admin/layanan', ServiceIndex::class)->name('admin.services');
        Route::get('/admin/carousel', CarouselIndex::class)->name('admin.carousel');
        Route::get('/admin/users', UserIndex::class)->name('admin.users');
    });
});

require __DIR__.'/auth.php';
