<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\userController;
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



Route::get('/users', [UserController::class, 'getAlluser']);



Route::get('/getfarms',[FarmController::class , 'getFarms']);
Route::get('/totalFarm',[FarmController::class , 'getCountOfFarms']);

Route::get('/totalField',[FieldController::class , 'getCountOfField']);

Route::get('/contacts', [ContactController::class, 'getAllContacts']);
Route::DELETE('/contacts/{id}', [ContactController::class, 'destroy']);
Route::get('/contacts/{contactID}', [ ContactController::class, 'getContactDetail' ]);
Route::post('/contacts', [ContactController::class, 'store']);
Route::put('/contacts/{id}', [ContactController::class, 'updateContact']);


Route::post('/login', [ AuthController::class, 'login' ]);

// Authenticated routes
// Route::middleware('auth:sanctum')->group(function () {
   
//     Route::post('/logout', [AuthController::class, 'logout']);
// });

