@extends('layouts.app')
@section('title', 'Producto')
@section('content')
    <div class="container">
        <div>
            <div class="card" style="border-style: none!important; margin-top: 15px">
                <div class="container" style="border-style: none!important; background-color: #d84315; border-radius: 5px; width: 42rem">
                    <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">
                    <li class="list-group-item" style="border-style: none!important; width: 40rem; margin: 0 auto; background-color: #d84315;">
                        <h2 style="color:#ffffff; text-align: center">
                            VISUALIZAR PRODUCTO
                        </h2>
                    </li>

                    <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">

                    <div  style="margin-top: 10px; width: 300px ; height: 300px; float: left; display: inline-block; margin-top: 10px; margin-bottom: 1px; margin-left: 10px; margin-right: 10px">
                        <img src="/images/productos.jpg" class="card-img-top" alt="">
                    </div>

                    <div style="float: left; display: inline-block; margin-top: 10px">
                        <p style="color: white; margin-left: 20px">ID Cliente: <strong style="color: white">{{$producto->id}} </strong></p>
                        <p style="color: white; margin-left: 20px">Nombre: <strong style="color: white">{{$producto->nombre_producto}} </strong></p>
                        <p style="color: white; margin-left: 20px">Categoria: <strong style="color: white">{{$producto->categoria_producto}} </strong> </p>
                        <p style="color: white; margin-left: 20px">Precio de Compra: <strong style="color: white">L. {{$producto->precio_compra}} </strong></p>
                        <p style="color: white; margin-left: 20px">Precio de Venta: <strong style="color: white">L. {{$producto->precio_venta}} </strong> </p>
                    </div>

                </div>
            </div>
        </div>
@endsection
