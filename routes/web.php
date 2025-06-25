<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizQuestionController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/store', [HomeController::class, 'store'])->name('store');
Route::post('/show-score/{guest_user}', [HomeController::class, 'showScore'])->name('show.score');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('quiz/question', QuizQuestionController::class)->names('quiz.question');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
