<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [JobController::class, 'index']);

Route::get('/search', SearchController::class);


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/jobs' , [JobController::class, 'all'])->name('jobs.all');
    Route::get('/jobs/create' , [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs/store' , [JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{id}/edit' , [JobController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{id}/update' , [JobController::class, 'update'])->name('jobs.update');
    Route::get('/jobs/{id}/delete' , [JobController::class, 'destroy'])->name('jobs.destroy');
});

require __DIR__.'/auth.php';
