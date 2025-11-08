<?php

//use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BetsController;

Route::resource('admin', AdminController::class);
Route::resource('users', AuthController::class);

// Route::get('/',function(){
//     return view('betpro.index');
// })->name('index');


//get routes - show forms
Route::get('/login', function () {
    return view('betpro.login');
})->name('betpro.login');

Route::get('/register', function () {
    return view('betpro.register');
})->name('betpro.register');
// Admin routes
Route::get('/admin', [AdminController::class, 'index'])->name('betpro.admin');
Route::post('/admin/addbets', [AdminController::class, 'storebets'])->name('betpro.addbets');

// User dashboard
Route::get('/user', [AuthController::class, 'user'])->name('betpro.dashboard');

//post routes
Route::post('/login', [AuthController::class, 'login'])->name('betpro.signin');
Route::post('/register', [AuthController::class,'register'] )->name('betpro.signup');

Route::post('/storebets',[AdminController::class, 'storebets'])->name('betpro.admin.storebets');

//optional route
Route::get('/',[LandingController::class, 'index'])->name('index');