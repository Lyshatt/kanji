<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\KanjiController;
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

Route::get('/', [Generalcontroller::class, 'index']);

Route::get('kanji/create', [KanjiController::class, 'create']);
