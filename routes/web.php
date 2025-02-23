<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::put('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
Route::get('/usersjson', [App\Http\Controllers\Admin\UserController::class, 'indexPaginado'])->name('userss.index');

Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
