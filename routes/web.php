<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\KanjiController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WordController;
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
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/', [Generalcontroller::class, 'index']);
Route::get('/impressum', [Generalcontroller::class, 'impressum']);

Route::get('/kanji/create', [KanjiController::class, 'create'])->middleware('auth');
Route::post('/kanji/create', [KanjiController::class, 'store'])->middleware('auth');

Route::get('/kanji/edit/{symbol}', [KanjiController::class, 'edit'])->middleware('auth');
Route::post('/kanji/edit/{symbol}', [KanjiController::class, 'update'])->middleware('auth');

Route::get('/word/edit/{id}', [WordController::class, 'edit'])->middleware('auth');
Route::post('/word/edit/{id}', [WordController::class, 'update'])->middleware('auth');

Route::get('/lesson', function () { return redirect('/'); });
Route::post('/lesson', [LessonController::class, 'index'] );

Route::get('/lesson/random', [LessonController::class, 'random']);

Route::get('/backend', [BackendController::class, 'index'] )->middleware('auth');
