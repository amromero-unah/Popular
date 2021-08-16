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

Route::get('/clientes/{id}/destroy',[ClienteController::class,"destroy"])
    ->name("cliente.destroy");

Route::delete('/clientes/{id}/destroy',[ClienteController::class,"destroy"])
    ->name("cliente.destroy");

Route::get("/clientes/busqueda",[ClienteController::class,"search"])
    ->name("cliente.search");

Route::get("/clientes/create/",[ClienteController::class,"create"])
    ->name("cliente.create");

Route::post("/clientes/store",[ClienteController::class,"store"])
    ->name("cliente.store");

Route::get("/clientes/busqueda",[ClienteController::class,"buscarCliente"])
    ->name("cliente.buscar");

Route::get("/proveedores",[ProveedorController::class,"index"])
    ->name("proveedor.index");

Route::get("/proveedores/{id}/",[ProveedorController::class,"show"])
    ->name("proveedor.show")->where('id','[0-9]+');

Route::get('/proveedores/{id}/destroy',[ProveedorController::class,"destroy"])
    ->name("proveedor.destroy");

Route::delete('/proveedores/{id}/destroy',[ProveedorController::class,"destroy"])
    ->name("proveedor.destroy");

Route::get("/proveedores/busqueda",[ProveedorController::class,"search"])
    ->name("proveedor.search");

Route::get("/proveedores/create/",[ProveedorController::class,"create"])
    ->name("proveedor.create");

Route::post("/proveedores/store",[ProveedorController::class,"store"])
    ->name("proveedor.store");

Route::get("/productos",[ProductoController::class,"index"])
    ->name("producto.index");

Route::get("/productos/{id}/",[ProductoController::class,"show"])
    ->name("producto.show")->where('id','[0-9]+');

Route::get('/productos/{id}/destroy',[ProductoController::class,"destroy"])
    ->name("producto.destroy");

Route::delete('/productos/{id}/destroy',[ProductoController::class,"destroy"])
    ->name("producto.destroy");

Route::get("/productos/busqueda",[ProductoController::class,"search"])
    ->name("producto.search");

Route::get("/productos/create/",[ProductoController::class,"create"])
    ->name("producto.create");

Route::post("/productos/store",[ProductoController::class,"store"])
    ->name("producto.store");




