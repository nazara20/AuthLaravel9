<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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



// Route Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // route logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // route role
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('role');
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/student/dashboard', [HomeController::class, 'index'])->name('student.dashboard');
});


    //Grouping Role Route
    // Route::middleware('role:admin')->group(function () {
    //     Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    // });

    // Route::middleware('role:user')->group(function () {
    //     Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    // });

    // Route::middleware('role:student')->group(function () {
    //     Route::get('/student/dashboard', [HomeController::class, 'index'])->name('student.dashboard');
    // });


     