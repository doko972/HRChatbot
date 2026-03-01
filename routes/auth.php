<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
 * Mapping des routes (à conserver en lieu sûr) :
 *   /xk9r2p        → register
 *   /b7m4w1        → login
 *   /q3f8n5        → forgot-password
 *   /h6v2y4/{tok}  → reset-password
 *   /d5z9c3        → verify-email
 *   /p8e2s7        → verification-notification
 *   /m8r3t1        → confirm-password
 *   /w4b9j2        → password update
 *   /j5x1p7        → logout
 */

Route::middleware('guest')->group(function () {
    Route::get('xk9r2p', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('xk9r2p', [RegisteredUserController::class, 'store']);

    Route::get('b7m4w1', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('b7m4w1', [AuthenticatedSessionController::class, 'store']);

    Route::get('q3f8n5', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('q3f8n5', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('h6v2y4/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('h6v2y4', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('d5z9c3', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('d5z9c3/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('p8e2s7', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('m8r3t1', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('m8r3t1', [ConfirmablePasswordController::class, 'store']);

    Route::put('w4b9j2', [PasswordController::class, 'update'])->name('password.update');

    Route::post('j5x1p7', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
