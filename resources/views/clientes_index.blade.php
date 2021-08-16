@extends('layouts.app')
@section('title', 'Clientes')
@section('content')
    <div class="container" style="margin-top: 15px" >
        <div class="row">
            <div class="col"  >
                <ul class="list-group" style="width: 58rem; margin: 0 auto">
                    <li class="list-group-item" style="background-color:#e91e63">
                        <h2 style="color:#ffffff;">
                            CLIENTES
                            <a class="btn-sm btn-info float-right" style="width: 10px; height: 20px" href="{{route("cliente.create")}}"><i
                                    class="fa fa-plus"></i> Agregar</a>
                        </h2>
                    </li>
                </ul>
            </div>

            @if($clientes->count())
                <div class="table-responsive-sm -mr-2 col-md-10"
                     style="text-align: center; margin: 0 auto; margin-bottom: 10px;
                     margin-top: 20px;">
                    <table name="tabla_prove" class="table">
                        <tr>
                            <thead style="background: #e91e63; color: #ffffff">
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
                                <td>
                                    <a class="btn btn-primary" href="{{route('cliente.show', ['id'=>$cliente->id])}}">Ver</a>
                                    <a class="btn btn-success" href="">Editar</a>
                                    <a class="btn btn-danger" href="">Eliminar</a>
                                </td>
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
