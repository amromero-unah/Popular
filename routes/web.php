<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;

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

Route::get("/clientes",[ClienteController::class,"index"])
    ->name("cliente.index");

Route::get("/clientes/{id}/",[ClienteController::class,"show"])
    ->name("cliente.show")->where('id','[0-9]+');

Route::get("/clientes/create",[ClienteController::class,"create"])
    ->name("cliente.create");

Route::post("/clientes/create",[ClienteController::class,"store"])
    ->name("cliente.create");

Route::get("/clientes/{id}/edit",[ClienteController::class,"edit"])
    ->name("cliente.edit")->where('id','[0-9]+');

Route::put("/clientes/{id}/edit",[ClienteController::class,"update"])
    ->name("cliente.edit")->where('id','[0-9]+');

Route::delete('/clientes/{id}/destroy',[ClienteController::class,"destroy"])
    ->name("cliente.destroy");

Route::get("/clientes/busqueda",[ClienteController::class,"search"])
    ->name("cliente.search");

Route::get("/clientes/busqueda",[ClienteController::class,"buscarCliente"])
    ->name("cliente.buscar");


