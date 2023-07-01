<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\PerfilesController;
use App\Http\Controllers\FotosController;
use App\Http\Controllers\FotosArtistaController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/login',[HomeController::class,'login'])->name('home.login');

Route::resource('/perfiles',PerfilesController::class)->parameters('perfiles','perfil');

Route::post('/cuentas/login',[CuentasController::class,'acceso'])->name('cuentas.acceso');
Route::get('/cuentas/logout',[CuentasController::class,'logout'])->name('cuentas.logout');
Route::resource('/cuentas',CuentasController::class)->parameters('cuentas','cuenta');

Route::get('/imagenban',[FotosArtistaController::class,'index'])->name('imagenban.index');
Route::put('/imagenban/{imagen}',[FotosArtistaController::class,'unban'])->name('imagenban.unban');
Route::get('/imagenes/{imagen}/ban',[FotosArtistaController::class,'ban'])->name('imagenes.ban');
Route::put('/imagen/{imagen}',[FotosArtistaController::class,'banear'])->name('imagenes.banear');
Route::get('/imagenes/all',[FotosController::class,'all'])->name('imagenes.all');


Route::resource('/imagenes',FotosController::class)->parameters([
    'imagenes' => 'imagen'
]);
