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

/*  RUTAS DE CLIENTES  */
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

/*  RUTAS DE PROVEEDORES  */
Route::get("/proveedores",[ProveedorController::class,"index"])
    ->name("proveedor.index");

    Route::get("/proveedores/{id}/",[ProveedorController::class,"show"])
    ->name("proveedor.show")->where('id','[0-9]+');

Route::get("/proveedores/create",[ProveedorController::class,"create"])
    ->name("proveedor.create");

Route::post("/proveedores/create",[ProveedorController::class,"store"])
    ->name("proveedor.create");

Route::get("/proveedores/{id}/edit",[ProveedorController::class,"edit"])
    ->name("proveedor.edit")->where('id','[0-9]+');

Route::put("/proveedores/{id}/edit",[ProveedorController::class,"update"])
    ->name("proveedor.edit")->where('id','[0-9]+');

Route::delete('/proveedores/{id}/destroy',[ProveedorController::class,"destroy"])
    ->name("proveedor.destroy");

Route::get("/proveedores/busqueda",[ProveedorController::class,"search"])
    ->name("proveedor.search");

Route::get("/proveedores/busqueda",[ProveedorController::class,"buscarProveedor"])
    ->name("proveedor.buscar");

/*  RUTAS DE PRODUCTOS  */
Route::get("/productos",[ProductoController::class,"index"])
    ->name("producto.index");

Route::get("/productos/{id}/",[ProductoController::class,"show"])
    ->name("producto.show")->where('id','[0-9]+');

Route::get("/productos/create",[ProductoController::class,"create"])
    ->name("producto.create");

Route::post("/productos/create",[ProductoController::class,"store"])
    ->name("producto.create");

Route::get("/productos/{id}/edit",[ProductoController::class,"edit"])
    ->name("producto.edit")->where('id','[0-9]+');

Route::put("/productos/{id}/edit",[ProductoController::class,"update"])
    ->name("producto.edit")->where('id','[0-9]+');

Route::delete('/productos/{id}/destroy',[ProductoController::class,"destroy"])
    ->name("producto.destroy");



