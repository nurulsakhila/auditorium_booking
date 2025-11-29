<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Session;

// =====================
// PUBLIC PAGES
// =====================

Route::get('/', function () {
    return view('public.home');
})->name('home');

Route::get('/jadwal', [BookingController::class, 'publicSchedule'])
    ->name('schedule');

Route::get('/booking', function () {
    return view('public.booking-form');
})->name('booking.form');

//SIMPAN PENGAJUAN BOOKING
Route::post('/booking', [BookingController::class, 'store'])
    ->name('booking.store');

Route::get('/tentang', function () {
    return view('public.about');
})->name('about');

// login
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// logout
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// protect dashboard

Route::middleware('admin')->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Daftar Booking
    Route::get('/admin/booking', [BookingController::class, 'index'])
        ->name('admin.booking.index');

    // Export
    Route::get('/admin/booking/export/excel', [BookingController::class, 'exportExcel'])->name('admin.booking.export.excel');
    Route::get('/admin/booking/export/pdf', [BookingController::class, 'exportPdf'])->name('admin.booking.export.pdf');

    // Filter booking by date (untuk calendar di booking page)
    Route::get('/admin/booking/filter', [BookingController::class, 'getBookingsByDate'])
        ->name('admin.booking.filter');

    // Detail Booking
    Route::get('/admin/booking/detail-booking/{id}', [BookingController::class, 'show'])
        ->name('admin.booking.detail');

    // APPROVE
    Route::post('/admin/booking/{id}/approve', [BookingController::class, 'approve'])
        ->name('admin.booking.approve');

    // REJECT
    Route::post('/admin/booking/{id}/reject', [BookingController::class, 'reject'])
        ->name('admin.booking.reject');

    // Kalender 
    Route::get('/admin/calendar', [AdminDashboardController::class, 'calendar'])
        ->name('admin.calendar');

    Route::get('/admin/calendar/data', [AdminDashboardController::class, 'calendarData']);

});


// =====================
// BREEZE (Kalau mau dipakai backend auth admin nanti)
// =====================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
