<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\KanjiController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\Auth\LoginController;
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

// Auth::routes();

Route::get('/', [Generalcontroller::class, 'index']);

Route::get('/kanji/create', [KanjiController::class, 'create'])->middleware('auth');
Route::post('/kanji/store', [KanjiController::class, 'store'])->middleware('auth');;
Route::get('/kanji/store', function () { return redirect('/kanji/create'); });

Route::post('/lesson', [LessonController::class, 'index'] );
Route::get('/lesson', function () { return redirect('/'); });

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
