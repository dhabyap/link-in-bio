<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('brutalist');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Deployment Helper (for Shared Hosting)
Route::get('/deploy/setup', [\App\Http\Controllers\DeploymentController::class, 'setup']);

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('links', \App\Http\Controllers\Admin\LinkController::class);
    Route::resource('portfolios', \App\Http\Controllers\Admin\PortfolioController::class);
});

// Public profile route (must be after admin routes)
// (Public profile route moved to bottom after auth routes)

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Public Profile Route (Wildcard) - Should be at the bottom
Route::get('/{username}', [\App\Http\Controllers\PublicProfileController::class, 'show'])->name('public.profile');
