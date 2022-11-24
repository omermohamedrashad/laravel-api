<?php

use App\Http\Controllers\Api\PasswordReset\CodeCheckerController;
use App\Http\Controllers\Api\PasswordReset\ForgotPasswordController;
use App\Http\Controllers\Api\PasswordReset\ResetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'auth'],function (){
    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('login', [LoginController::class, 'create']);
    Route::post('login', [LoginController::class, 'show']);
    Route::post('password/email',  ForgotPasswordController::class);
    Route::post('password/code/check', CodeCheckerController::class);
    Route::post('password/reset', ResetPasswordController::class);

})->middleware('auth:sanctum');
