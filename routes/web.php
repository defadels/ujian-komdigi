<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\CategoryIndex;
use App\Livewire\Admin\ServiceIndex;
use App\Livewire\Admin\CarouselIndex;

use App\Livewire\Public\Home;
use App\Livewire\Public\CategoryServices;
use App\Livewire\Public\ServiceDetail;

Route::get('/', Home::class)->name('home');
Route::get('/kategori/{id}', CategoryServices::class)->name('public.category.services');
Route::get('/layanan/{id}', ServiceDetail::class)->name('public.service.detail');
Route::view('/tentang-kami', 'about')->name('about');
Route::view('/hubungi-kami', 'contact')->name('contact');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');

    // Admin Routes
    Route::get('/admin/kategori-layanan', CategoryIndex::class)->name('admin.categories');
    Route::get('/admin/layanan', ServiceIndex::class)->name('admin.services');
    Route::get('/admin/carousel', CarouselIndex::class)->name('admin.carousel');
});

require __DIR__.'/auth.php';
