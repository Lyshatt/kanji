<?php

use App\Http\Controllers\Api\KanjiApiController;
use App\Http\Controllers\Api\KanjiCommonWordsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['as' => 'api.'], function() {
    Orion::resource('kanji', KanjiApiController::class);

    Orion::hasManyResource('kanji', 'commonWords', KanjiCommonWordsApiController::class);
});
