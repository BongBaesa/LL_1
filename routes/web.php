<?php

use App\Http\Controllers\DogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Dog; 

Route::get('/', function () {
    $dogs = Dog::all();
    return view('welcome', ['dogs'=> $dogs]);
})->name('index');

Route::post(
    '/dogs', 
    [DogController::class, 'create'] 
)->name('dog.create');

Route::delete(
    '/dogs/{id}', 
    [DogController::class, 'delete'] 
)->name('dog.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
