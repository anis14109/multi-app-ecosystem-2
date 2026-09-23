<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NoticeController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

Route::get('/about', [AboutController::class, 'index'])->name('frontend.about');

Route::get('/notice', [NoticeController::class, 'index'])->name('frontend.notice.index');

Route::get('/gallery', [GalleryController::class, 'index'])->name('frontend.gallery.index');

Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact');

// Dynamic CMS page. Registered last and constrained to URL-safe slugs so it
// never captures /access/*, /api/*, /up, or any static route above.
Route::get('/{slug}', [PageController::class, 'show'])
    ->where('slug', '[a-zA-Z0-9][a-zA-Z0-9-_]*')
    ->name('frontend.page');