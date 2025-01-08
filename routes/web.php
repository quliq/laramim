<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('module/admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/users/list', [UserController::class, 'index'])->name('users.list');
    Route::get('/users/list', [UserController::class, 'index'])->name('users.list');
    Route::get('/users/create', [UserController::class, 'index'])->name('users.create');
    Route::get('/users/edit', [UserController::class, 'index'])->name('users.edit');
    Route::get('/users/destroy', [UserController::class, 'index'])->name('users.destroy');
    Route::get('/users/show', [UserController::class, 'show'])->name('users.show');

    // Route::resource('roles', "RoleController");
    // Route::resource('users', "UserController");
});

require __DIR__.'/auth.php';
