<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AlquilerController;
use App\Http\Controllers\FacturacionController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\VentaController;






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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::get('/alquilers', [AlquilerController::class, 'index'])->name('alquilers.index');
Route::get('/alquilers/create', [AlquilerController::class, 'create'])->name('alquilers.create');
Route::post('/alquilers', [AlquilerController::class, 'store'])->name('alquilers.store');
Route::get('/alquilers/{id}', [AlquilerController::class, 'edit'])->name('alquilers.edit');
Route::put('/alquilers/{id}', [AlquilerController::class, 'update'])->name('alquilers.update');
Route::delete('/alquilers/{id}', [AlquilerController::class, 'destroy'])->name('alquilers.destroy');

Route::get('/facturacions', [FacturacionController::class, 'index'])->name('facturacions.index');
Route::get('/facturacions/create', [FacturacionController::class, 'create'])->name('facturacions.create');
Route::post('/facturacions', [FacturacionController::class, 'store'])->name('facturacions.store');
Route::get('/facturacions/{id}', [FacturacionController::class, 'edit'])->name('facturacions.edit');
Route::put('/facturacions/{id}', [FacturacionController::class, 'update'])->name('facturacions.update');
Route::delete('/facturacions/{id}', [FacturacionController::class, 'destroy'])->name('facturacions.destroy');

Route::get('/inmuebles', [InmuebleController::class, 'index'])->name('inmuebles.index');
Route::get('/inmuebles/create', [InmuebleController::class, 'create'])->name('inmuebles.create');
Route::post('/inmuebles', [InmuebleController::class, 'store'])->name('inmuebles.store');
Route::get('/inmuebles/{id}', [InmuebleController::class, 'edit'])->name('inmuebles.edit');
Route::put('/inmuebles/{id}', [InmuebleController::class, 'update'])->name('inmuebles.update');
Route::delete('/inmuebles/{id}', [InmuebleController::class, 'destroy'])->name('inmuebles.destroy');

Route::get('/pagos', [PagoController::class, 'index'])->name('pagos.index');
Route::get('/pagos/create', [PagoController::class, 'create'])->name('pagos.create');
Route::post('/pagos', [PagoController::class, 'store'])->name('pagos.store');
Route::get('/pagos/{id}', [PagoController::class, 'edit'])->name('pagos.edit');
Route::put('/pagos/{id}', [PagoController::class, 'update'])->name('pagos.update');
Route::delete('/pagos/{id}', [PagoController::class, 'destroy'])->name('pagos.destroy');

Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
Route::get('/ventas/{id}', [VentaController::class, 'edit'])->name('ventas.edit');
Route::put('/ventas/{id}', [VentaController::class, 'update'])->name('ventas.update');
Route::delete('/ventas/{id}', [VentaController::class, 'destroy'])->name('ventas.destroy');


Auth::routes();

Route::get('sigi', 'HomeController@index')->name('sigi');
