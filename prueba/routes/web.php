<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\HomeController;
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

Route::get('/', HomeController::class);

Route::get('departamentos', [DepartamentoController::class, 'index']);

Route::get('departamentos/create', [DepartamentoController::class, 'create']);

Route::get('departamentos/{departamento}', [DepartamentoController::class, 'show']);