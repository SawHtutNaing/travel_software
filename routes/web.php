<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::middleware(['auth'])->group(function () {
        Route::resource('tours', TourController::class);

    Route::middleware(['role:admin'])->group(function () {
        // Route::resource('tours', TourController::class);
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/export', [ReportController::class, 'export'])->name('reports.export');
        Route::resource('announcements', AnnouncementController::class)->except(['show']);
    });

    Route::middleware(['role:user'])->group(function () {
        Route::get('bookings/create/{tour}', [BookingController::class, 'create'])->name('bookings.create');
        Route::post('bookings/{tour}', [BookingController::class, 'store'])->name('bookings.store');
        Route::resource('bookings', BookingController::class)->only(['index', 'show', 'destroy']);
        Route::get('reviews/create/{tour}', [ReviewController::class, 'create'])->name('reviews.create');
        Route::post('reviews/{tour}', [ReviewController::class, 'store'])->name('reviews.store');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::post('/send_mail',[HomeController::class, 'send_mail'])->name('contact.submit');
require __DIR__.'/auth.php';
