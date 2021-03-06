<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified','role','isBlock'])->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin');
    Route::get('/admin/users', [UserController::class, 'users']);
    Route::get('/admin/users/{id}/delete', [UserController::class, 'delete']);
    Route::get('/admin/users/{id}/set-block', [UserController::class, 'setBlock']);
    Route::get('/admin/users/{id}/set-admin', [UserController::class, 'setAdmin']);
});

Route::middleware(['auth:sanctum', 'verified','isBlock'])->group(function () {

    Route::post('/file/upload', [DashboardController::class, 'uploadFile']);
    Route::get('/file/download/{id}', [DashboardController::class, 'downloadFile']);
    Route::get('/file/delete/{id}', [DashboardController::class, 'deleteFile']);
    Route::get('/file/list/', [DashboardController::class, 'listFile']);
});

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/block', [DashboardController::class, 'indexBlock'])->name('block');

Route::get('language/{language}', function ($language) {
    Session()->put('locale', $language);
    return redirect()->back();
})->name('language');