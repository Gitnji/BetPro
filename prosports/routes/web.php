<?php

//use App\Http\Controllers\AuthController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::resource('admin', AdminController::class);
Route::resource('users', AuthController::class);

Route::get('/', function () {
    return view('betpro.index');
})->name('index');

//get routes
Route::get('/login', [AuthController::class, 'login'])->name('betpro.login');
Route::get('/register', [AuthController::class,'register'] );
Route::get('/admin', [AdminController::class, 'index'])->name('betpro.admin');

Route::get('/showname', [AuthController::class, 'showname'])->name('betpro.dashboard');

Route::get('/login', function () {
    return view('betpro.login');
})->name('betpro.login');

Route::get('/register', function () {
    return view('betpro.register');
})->name('betpro.register');

// Route::get('/admin', function () {
//     return view('betpro.admin');
// })->name('betpro.admin');
// Route::get('/dashboard', function () {
//     return view('betpro.dashboard');
// })->name('betpro.dashboard');

//post routes
Route::post('/login', [AuthController::class, 'login'])->name('betpro.login');
Route::post('/register', [AuthController::class,'register'] )->name('betpro.register');




