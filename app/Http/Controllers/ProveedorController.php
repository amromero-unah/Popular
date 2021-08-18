<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proveedores = Proveedor::search($request->search)->paginate(10);
        return view('proveedores.proveedores_index')->with('proveedores', $proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.proveedores_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nombre_proveedor" => "required|max:50",
            "correo_proveedor" => "required|unique:proveedors,correo_proveedor",
            "nombre_contacto_proveedor" => "required|max:50",
            "telefono_proveedor" => "required|max:99999999|unique:proveedors,telefono_proveedor,"
        ], [
            "nombre_proveedor.required" => "Se requiere ingresar el nombre del proveedor.",
            "nombre_peroveedor.max" => "El nombre no debe ser máximo a 50 caracteres.",
            "correo_proveedor.required" => "Se requiere ingresar el correo del proveedor.",
            "telefono_peroveedor.required" => "Se requiere ingresar el télefono del proveedor",
            "telefono_proveedor.max" => "El télefono debe ser igual a 8 caracteres",
            "telefono_proveedor.min" => "El télefono debe ser igual a 8 caracteres",
            "telefono_proveedor.unique" => "El télefono ya ha sido registrado",
            "correo_proveedor.unique" => "El correo electrónico ya ha sido registrado",
            "nombre_contacto_proveedor.required" => "Se requiere ingresar el nombre del contacto del proveedor.",
            "nombre_contacto_peroveedor.max" => "El nombre del contacto no debe ser máximo a 50 caracteres.",
        ]);

        $proveedor = new Proveedor();
        $proveedor->nombre_proveedor = $request->input("nombre_proveedor");
        $proveedor->correo_proveedor = $request->input("correo_proveedor");
        $proveedor->nombre_contacto_proveedor = $request->input("nombre_contacto_proveedor");
        $proveedor->telefono_proveedor = $request->input("telefono_proveedor");
        $proveedor->save();

        return redirect()->route("proveedor.index")->with("exito", "Se creó exitosamente el proveedor");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.proveedores_show')->with('proveedor', $proveedor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view("proveedores.proveedores_update")->with("proveedor", $proveedor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "nombre_proveedor" => "required|max:50",
            "correo_proveedor" => "required|unique:proveedors,correo_proveedor,". $id,
            "nombre_contacto_proveedor" => "required|max:50",
            "telefono_proveedor" => "required|max:99999999|unique:proveedors,telefono_proveedor,". $id,
        ], [
            "nombre_proveedor.required" => "Se requiere ingresar el nombre del proveedor.",
            "nombre_peroveedor.max" => "El nombre no debe ser máximo a 50 caracteres.",
            "correo_proveedor.required" => "Se requiere ingresar el correo del proveedor.",
            "telefono_peroveedor.required" => "Se requiere ingresar el télefono del proveedor",
            "telefono_proveedor.max" => "El télefono debe ser igual a 8 caracteres",
            "telefono_proveedor.min" => "El télefono debe ser igual a 8 caracteres",
            "telefono_proveedor.unique" => "El télefono ya ha sido registrado",
            "correo_proveedor.unique" => "El correo electrónico ya ha sido registrado",
            "nombre_contacto_proveedor.required" => "Se requiere ingresar el nombre del contacto del proveedor.",
            "nombre_contacto_peroveedor.max" => "El nombre del contacto no debe ser máximo a 50 caracteres.",
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->nombre_proveedor = $request->input("nombre_proveedor");
        $proveedor->correo_proveedor = $request->input("correo_proveedor");
        $proveedor->nombre_contacto_proveedor = $request->input("nombre_contacto_proveedor");
        $proveedor->telefono_proveedor = $request->input("telefono_proveedor");
        $proveedor->save();

        return redirect()->route("proveedor.index")->with("exito", "Se editó exitosamente el proveedor");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrfail($id);
        $proveedor->delete();

        return redirect()->route("proveedor.index")->with("error", "Se eliminó exitosamente el proveedor");
    }
    public function buscarProveedor(Request $request)
    {
        $busqueda = $request->input("busqueda");
        $proveedores = Proveedor::where("nombre",
            "like", "%" . $request->input("busqueda") . "%")
            ->paginate(10);

        return view("proveedores.proveedores_index")
            ->with("busqueda", $busqueda)->with("proveedores", $proveedores);
    }
}
