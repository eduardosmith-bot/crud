<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/principal','welcome')->name('principal');

Route::get('/home', [HomeController::class, 'consultaUsuario'])
        ->name('rotacontroller');

Route::get('/usuario/{id}/alterar', [HomeController::class, 'alterar'])
        ->name('user.alterar');

Route::get('/usuario/{id}/deletar', [HomeController::class, 'deletar'])
        ->name('user.deletar');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
