<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ReleaseController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\CortexWebController;
use App\Http\Controllers\SharedConversationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes publiques
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('cortex.chat')
        : redirect()->route('login');
})->name('home');
Route::get('/share/{token}', [SharedConversationController::class, 'show'])->name('share.conversation');

/*
|--------------------------------------------------------------------------
| Routes protégées (authentification requise)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Téléchargement (auth seul, pas de vérification email requise)
    Route::get('/download', [DownloadController::class, 'index'])->name('download');
    Route::get('/download/msi', [DownloadController::class, 'downloadMsi'])->name('download.msi');
    Route::get('/download/exe', [DownloadController::class, 'downloadExe'])->name('download.exe');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cortex Web - Interface de chat
    Route::get('/chat', [CortexWebController::class, 'index'])->name('cortex.chat');
    Route::get('/chat/c/{conversation}', [CortexWebController::class, 'show'])->name('cortex.conversation');
});
// Admin - Gestion des releases (auth + is_admin requis)
Route::middleware(['auth', 'admin'])->prefix('r7n3x9k')->name('admin.')->group(function () {
    Route::get('/releases', [ReleaseController::class, 'index'])->name('releases.index');
    Route::get('/releases/create', [ReleaseController::class, 'create'])->name('releases.create');
    Route::post('/releases', [ReleaseController::class, 'store'])->name('releases.store');
    Route::delete('/releases/{release}', [ReleaseController::class, 'destroy'])->name('releases.destroy');
    Route::patch('/releases/{release}/toggle', [ReleaseController::class, 'toggle'])->name('releases.toggle');
});
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');


require __DIR__ . '/auth.php';
