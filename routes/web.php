<?php

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
use App\Http\Controllers\YourController;






Route::get('/', function () {
    return view('welcome');
});
Route::get('/antrian', function () {
    return view('antrian');
});


Route::post('/submit-form', [YourController::class, 'handleFormSubmission'])->name('submit-form');
Route::get('/index', [YourController::class, 'index'])->name('index');
use App\Http\Controllers\AuthController;


use App\Http\Controllers\AdminLoginController;

Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


