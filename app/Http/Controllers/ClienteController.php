<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('clientes_index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes_create');
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
            "nombre_cliente" => "required|max:50",
            "telefono_cliente" => "required|max:99999999|unique:clientes,telefono_cliente,"
        ], [
            "nombre_cliente.required" => "Se requiere ingresar el nombre del cliente.",
            "nombre_cliente.max" => "El nombre no debe ser máximo a 50 caracteres.",
            "telefono_cliente.required" => "Se requiere ingresar el télefono del cliente",
            "telefono_cliente.max" => "El télefono debe ser igual a 8 caracteres",
            "telefono_cliente.min" => "El télefono debe ser igual a 8 caracteres",
            "telefono_cliente.unique" => "El télefono ya ha sido registrado",
        ]);

        $cliente = new Cliente();
        $cliente->nombre_cliente = $request->input("nombre_cliente");
        $cliente->telefono_cliente = $request->input("telefono_cliente");
        $cliente->save();

        return redirect()->route("cliente.index")->with("exito", "Se creó exitosamente el cliente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes_show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view("clientes_update")->with("cliente", $cliente);
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
            "nombre_cliente" => "required|max:50",
            "telefono_cliente" => "required|max:99999999|unique:clientes,telefono_cliente," . $id,
        ], [
            "nombre_cliente.required" => "Se requiere ingresar el nombre del cliente.",
            "nombre_cliente.max" => "El nombre no debe ser máximo a 50 caracteres.",
            "telefono_cliente.required" => "Se requiere ingresar el télefono del cliente",
            "telefono_cliente.max" => "El télefono debe ser igual a 8 caracteres",
            "telefono_cliente.min" => "El télefono debe ser igual a 8 caracteres",
            "telefono_cliente.unique" => "El télefono ya ha sido registrado",
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->nombre_cliente = $request->input("nombre_cliente");
        $cliente->telefono_cliente = $request->input("telefono_cliente");
        $cliente->save();

        return redirect()->route("cliente.index")->with("exito", "Se editó exitosamente el cliente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrfail($id);
        $cliente->delete();

        return redirect()->route("cliente.index")->with("error", "Se eliminó exitosamente el cliente.");
    }

    public function buscarCliente(Request $request)
    {
        $busqueda = $request->input("busqueda");
        $clientes = Cliente::where("nombre_cliente",
            "like", "%" . $request->input("busqueda") . "%")
            ->paginate(10);

        return view("clientes.clientes_index")
            ->with("busqueda", $busqueda)->with("clientes", $clientes);
    }
}
