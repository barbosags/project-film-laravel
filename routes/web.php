<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

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

Route::get('/', [FilmController::class, 'index']);
Route::get('/films/create', [FilmController::class, 'create'])->middleware('auth');
Route::get('/films/{id}', [FilmController::class, 'show']);
Route::post('/films', [FilmController::class, 'store']);

Route::delete('/films/{id}', [FilmController::class, 'destroy'])->middleware('auth');
Route::get('/films/edit/{id}', [FilmController::class, 'edit'])->middleware('auth');
Route::put('/films/update/{id}', [FilmController::class, 'update'])->middleware('auth');

Route::get('/dashboard', [FilmController::class, 'dashboard'])->middleware('auth');
