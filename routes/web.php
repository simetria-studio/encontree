<?php

use App\Http\Controllers\PreCadastroController;
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

Route::get('/', [PreCadastroController::class, 'index']);
Route::get('/success', [PreCadastroController::class, 'create'])->name('success');
Route::post('/pre/store', [PreCadastroController::class, 'store'])->name('pre.store');