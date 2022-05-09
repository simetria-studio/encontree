<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PainelController;
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

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [PainelController::class, 'index'])->name('painel');
    Route::get('site-empresas', [PainelController::class, 'empresas'])->name('site.empresas');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('file-import', [EmpresaController::class, 'import'])->name('file-import');
Route::get('empresas', [EmpresaController::class, 'index'])->name('empresas');
Route::get('empresas-filtro', [EmpresaController::class, 'filtro'])->name('filtro');
