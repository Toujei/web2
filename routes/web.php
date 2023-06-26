<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\PerfilesController;
use App\Http\Controllers\FotosController;




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


Route::resource('/perfiles',PerfilesController::class)->parameters('perfiles','perfil');

Route::resource('/cuentas',CuentasController::class)->parameters('cuentas','cuenta');

Route::resource('/imagenes',FotosController::class)->parameters([
    'imagenes' => 'imagen'
]);
