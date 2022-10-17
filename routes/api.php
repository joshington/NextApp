<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//==route to handle collections========
Route::get('/test', [ApiController::class, 'testin']);
Route::get('/sample', [ApiController::class, 'collectSample']);

Route::controller(ApiController::class)->group(function(){
    Route::post('/collect', [ApiController::class, 'collectMoney']);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
