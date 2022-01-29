<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FavoritosPublicosController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes(['reset' => 'false']);

// Rutas de Recurso para el controlador de Categorias
Route::resource('categoria', CategoriaController::class)->middleware('auth');

// Rutas de Recurso para el controlador de Favoritos
Route::resource('favorito', FavoritoController::class)->middleware('auth');

// Listar Favoritos publicos en la vista Home
Route::get('/listado-favoritos-publicos', [FavoritosPublicosController::class, 'listadoFavoritosPublicos']);

// Detalle de Favoritos
Route::get('/ver-detalle-favorito/{id}', [FavoritosPublicosController::class, 'detalleFavoritos']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [FavoritoController::class, 'index'])->name('home');
});


