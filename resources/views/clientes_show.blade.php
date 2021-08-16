@extends('layouts.app')
@section('title', 'Cliente')
@section('content')
    <div class="container">
        <div>
            <div class="card" style="border-style: none!important; margin-top: 15px">
                <div class="container" style="border-style: none!important; background-color: #0D6EFD; border-radius: 5px; width: 42rem">
                    <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">
                    <li class="list-group-item active" style="border-style: none!important; width: 40rem; margin: 0 auto"><strong>CLIENTE</strong></li>
                    <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">

                    <div  style="margin-top: 10px; width: 300px ; height: 300px; float: left; display: inline-block; margin-top: 10px; margin-bottom: 1px; margin-left: 10px; margin-right: 10px">
                        <img src="/images/clientes.png" class="card-img-top" alt="">
                    </div>

                    <div style="float: left; display: inline-block; margin-top: 10px">
                        <p style="color: white; margin-left: 20px">ID Cliente: <strong style="color: white">{{$cliente->id}} </strong></p>
                        <p style="color: white; margin-left: 20px">Nombre Cliente: <strong style="color: white">{{$cliente->nombre_cliente}} </strong></p>
                        <p style="color: white; margin-left: 20px">Telefono Cliente: <strong style="color: white">{{$cliente->telefono_cliente}} </strong> </p>
                    </div>

                </div>
            </div>
        </div>
@endsection
