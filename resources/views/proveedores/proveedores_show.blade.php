@extends('layouts.app')
@section('title', 'Proveedores')
@section('content')
    <div class="container">
        <div>
            <div class="card" style="border-style: none!important; margin-top: 15px">
                <div class="container" style="border-style: none!important; background-color: #e9871e; border-radius: 5px; width: 42rem">
                    <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">
                    <li class="list-group-item active" style="border-style: none!important; width: 40rem; margin: 0 auto; background-color:#e9871e;">

                    <h2 style="color:#ffffff; text-align: center">
                            VISUALIZAR PROVEEDORES
                        </h2>
                    </li>

                    <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">

                    <div  style="margin-top: 10px; width: 300px ; height: 300px; float: left; display: inline-block; margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px">
                        <img src="/images/proveedores.jpg" style="margin-bottom:20px; border-radius: 5px " class="card-img-top" alt="">
                    </div>

                    <div style="float: left; display: inline-block; margin-top: 10px">
                        <p style="color: white; margin-left: 20px">ID Cliente: <strong style="color: white">{{$proveedor->id}} </strong></p>
                        <p style="color: white; margin-left: 20px">Nombre: <strong style="color: white">{{$proveedor->nombre_proveedor}} </strong></p>
                        <p style="color: white; margin-left: 20px">Teléfono: <strong style="color: white">{{$proveedor->telefono_proveedor}} </strong> </p>
                        <p style="color: white; margin-left: 20px">Email: <strong style="color: white">{{$proveedor->correo_proveedor}} </strong></p>
                        <p style="color: white; margin-left: 20px">Contacto: <strong style="color: white">{{$proveedor->nombre_contacto_proveedor}} </strong></p>
                    </div>

                </div>
            </div>
        </div>
@endsection
