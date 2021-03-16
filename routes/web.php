<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
//use App\Http\Controllers\FrontController;
use App\Http\Controllers\SignupController;
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

Route::get('/', [SigninController::class, 'index'])->name("signin");
Route::get('/signup', [SignupController::class, 'index']);

Route::post('/checkmail', [SignupController::class, 'checkmail'])->name('checkmail');
Route::post('/datastore', [SignupController::class, 'datastore'])->name('signup.store');
