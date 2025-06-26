<?php

use App\Http\Controllers\AttemptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizQuestionController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::post('/store', [HomeController::class, 'store'])->name('store');
Route::get('/leaderboard/{attempt?}', [HomeController::class, 'leaderboard'])->name('leaderboard');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('quiz/question', QuizQuestionController::class)->names('quiz.question');
    Route::get('quiz/leaderboard', [AttemptController::class, 'index'])->name('quiz.leaderboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('/{guest_user?}', [HomeController::class, 'index'])->name('home');
