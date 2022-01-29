<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentasController;
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


Route::get('/', [ProductoController::class, 'index']);

// Rutas de Recurso para el controlador de Categorias
Route::resource('categorias', CategoriaController::class);

// Rutas de Recurso para el controlador de Favoritos
Route::resource('productos', ProductoController::class)->except(['show']);
Route::get('productos/mas-stock', [ProductoController::class, 'masStockTiene']);
Route::get('productos/mas-vendido', [ProductoController::class, 'masVendido']);


// Rutas de Recurso para el controlador de Favoritos
// Route::resource('ventas', VentasController::class);


Route::post('ventas/crear', [VentasController::class, 'guardarProductoVenta']);
Route::get('ventas/{id}', [VentasController::class, 'show']);
