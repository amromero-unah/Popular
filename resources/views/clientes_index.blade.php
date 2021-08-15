@extends('layouts.app')
@section('title', 'Clientes')
@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive-sm -mr-2 col-md-10"
                 style="text-align: center; margin: 0 auto;
                     margin-top: 10px; background-color: #1C2D3F">
                <h1 style="color: white">CLIENTES</h1>

            </div>

            @if($clientes->count())
                <div class="table-responsive-sm -mr-2 col-md-10"
                     style="text-align: center; margin: 0 auto; margin-bottom: 10px;
                     margin-top: 20px;">
                    <table name="tabla_prove" class="table">
                        <tr>
                            <thead style="background: #1C2D3F; color: #ffffff">
                            <th scope="col">N°</th>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Opciones</th>
                            </thead>
                        </tr>
                        <tbody>
                        @foreach($clientes as $item=>$cliente)
                            <tr id="resultados">
                                <th style="font: caption; font-style: normal">{{$item+$clientes->firstItem()}}</th>
                                <td style="font: caption; text-align: center">{{$cliente->id_cliente}}</td>
                                <td style="font: caption; text-align: center">{{$cliente->nombre_cliente}}</td>
                                <td style="font: caption; text-align: center">{{$cliente->telefono_cliente}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <h4>No hay clientes agregados aún, presiona el botón de agregar.</h4>
                </div>
            @endif

            <div class="col-md-5" style="text-align: center; margin: 0 auto; margin-bottom: 10px; margin-top: 12px;">
                {{ $clientes->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
@yield('@Copyrigth El Popular')
