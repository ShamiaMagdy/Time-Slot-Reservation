<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/Register',[AuthController::class, 'Register']);
Route::post('/Login',[AuthController::class, 'Login']);
Route::post('/UpdatePassword',[AuthController::class, 'UpdatePassword']);
Route::post('/Logout',[AuthController::class, 'Logout']);
Route::get('/getAllUsers',[UserController::class, 'getAllUsers']);
Route::get('/getSpecificUser/{username}',[UserController::class, 'getSpecificUser']);
Route::post('/deleteUserAccount/{username}',[UserController::class, 'deleteUserAccount']);
Route::post('/updateUserData/{username}',[UserController::class, 'updateUserData']);
Route::post('/checkVerification/{email}/{verificationcode}',[MailerController::class, 'checkVerification']);
Route::get('/getSpecificServiceType/{id}',[ServiceTypeController::class, 'getSpecificServiceType']);
