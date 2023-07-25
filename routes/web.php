<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoggedController;
use Illuminate\Support\Facades\Route;

Route :: get('/', [GuestController :: class, 'index'])
    -> name('project.index');

Route :: get('/show/{id}', [LoggedController :: class, 'show'])
    -> middleware(['auth'])
    -> name('project.show');

Route :: get('/create', [LoggedController :: class, 'create'])
    -> middleware(['auth'])
    -> name('project.create');
Route :: post('/store', [LoggedController :: class, 'store'])
    -> middleware(['auth'])
    -> name('project.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
