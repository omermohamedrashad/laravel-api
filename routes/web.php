<?php

use App\Http\Controllers\Api\PasswordReset\CodeCheckerController;
use App\Http\Controllers\Api\PasswordReset\ForgotPasswordController;
use App\Http\Controllers\Api\PasswordReset\ResetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

Route::get('/setup' ,function(){
    $credentials = [
        'email' => 'admin@admin.com',
        'password' => 'password'
    ];

    if (!Auth::attempt($credentials)){
        $user = new User();

        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);

        $user->save();

        if (Auth::attempt($credentials)){
            $user = Auth::user();

           $adminToken = $user->createToken('admin-token',['create','update','delete']);
           $updateToken = $user->createToken('update-token',['create','update']);
           $basicToken = $user->createToken('basic-token');

           return [
               'admin' => $adminToken->plainTextToken,
               'update' => $updateToken->plainTextToken,
               'basic' => $basicToken->plainTextToken
           ];
       }
    }
});
