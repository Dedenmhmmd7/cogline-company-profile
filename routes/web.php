<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage COGLINE (Public)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Contact Form Submission (Public)
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes - Protected by auth middleware
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Pricing Management
    Route::resource('pricing', PricingController::class);
    Route::post('pricing/{pricing}/toggle-active', [PricingController::class, 'toggleActive'])
         ->name('pricing.toggle-active');
    
    // Testimonials Management
    Route::resource('testimonials', TestimonialController::class);
    Route::post('testimonials/{testimonial}/toggle-active', [TestimonialController::class, 'toggleActive'])
         ->name('testimonials.toggle-active');
    
    // Contact Submissions Management
    Route::get('contacts', [ContactSubmissionController::class, 'index'])->name('contacts.index');
    Route::get('contacts/export', [ContactSubmissionController::class, 'export'])->name('contacts.export');
    Route::get('contacts/{contact}', [ContactSubmissionController::class, 'show'])->name('contacts.show');
    Route::put('contacts/{contact}/status', [ContactSubmissionController::class, 'updateStatus'])->name('contacts.update-status');
    Route::delete('contacts/{contact}', [ContactSubmissionController::class, 'destroy'])->name('contacts.destroy');
});

// User Dashboard redirect ke Admin Dashboard
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes (optional)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth Routes
require __DIR__.'/auth.php';