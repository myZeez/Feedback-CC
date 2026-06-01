<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/terima-kasih', [FeedbackController::class, 'thanks'])->name('feedback.thanks');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::middleware('admin')->group(function (): void {
        Route::get('/', [AdminFeedbackController::class, 'index'])->name('feedback.index');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
