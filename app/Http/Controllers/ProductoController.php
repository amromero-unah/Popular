<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::search($request->search)->paginate(10);
        return view('productos.productos_index')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.productos_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nombre_producto" => "required|max:50",
            "categoria_producto" => "required|max:50",
            "precio_compra"=>"required|min:1",
            "precio_venta"=>"required|min:precio_compra",


        ], [
            "nombre_producto.required" => "Se requiere ingresar el nombre del producto.",
            "nombre_producto.max" => "El nombre no debe ser máximo a 50 caracteres.",
            "nombre_producto.required" => "Se requiere ingresar la categoria del producto.",
            "nombre_producto.max" => "La categoria no debe ser máximo a 50 caracteres.",
            "telefono_cliente.required" => "Se requiere ingresar el télefono del cliente",
            "precio_compra.min" => "El precio de compra debe ser menor que el precio de venta",
            "precio_venta" => "El precio de compra debe ser menor que el precio de venta"
        ]);

        $producto = new Producto();
        $producto->nombre_producto = $request->input("nombre_producto");
        $producto->categoria_producto = $request->input("categoria_producto");
        $producto->precio_compra = $request->input("precio_compra");
        $producto->precio_venta = $request->input("precio_venta");
        $producto->save();

        return redirect()->route("producto.index")->with("exito", "Se creó exitosamente el producto");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.productos_show')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view("productos.productos_update")->with("producto", $producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            "nombre_producto" => "required|max:50",
            "categoria_producto" => "required|max:50",
            "precio_compra" => "required|min:precio_venta",
            "precio_venta" => "required",

        ], [

            "precio_compra.min" => "El precio de compra debe ser menor al precio de venta",
            "nombre_producto.required" => "Se requiere ingresar el nombre del producto.",
            "nombre_producto.max" => "El nombre no debe ser máximo a 50 caracteres.",
            "nombre_producto.required" => "Se requiere ingresar la categoria del producto.",
            "nombre_producto.max" => "La categoria no debe ser máximo a 50 caracteres.",
            "telefono_cliente.required" => "Se requiere ingresar el télefono del cliente",
            "precio_compra.max" => "El télefono debe ser igual a 20 digitos",
            "precio_venta.max" => "El télefono debe ser igual a 20 digitos",
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre_producto = $request->input("nombre_producto");
        $producto->categoria_producto = $request->input("categoria_producto");
        $producto->precio_compra = $request->input("precio_compra");
        $producto->precio_venta = $request->input("precio_venta");
        $producto->save();

        return redirect()->route("producto.index")->with("exito", "Se editó exitosamente el producto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrfail($id);
        $producto->delete();

        return redirect()->route("producto.index")->with("error", "Se eliminó exitosamente el producto");
    }
}
