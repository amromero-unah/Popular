@extends('layouts.app')
@section('title', 'Cliente')
@section('content')
    <div class="container">
        <div class="row" style="margin-top: 15px">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"
                 style="margin: 0 auto">

                <div class="col" style="margin: 0 auto">
                    <ul class="list-group" style="width: 33rem; margin: 0 auto">
                        <li class="list-group-item" style="background-color:#e91e63">
                            <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">
                            <h2 style="color:#ffffff; text-align: center">
                                EDITAR CLIENTE
                            </h2>
                            <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">


                            <div class="col-md-11" style="margin: 0 auto">
                                <form id="form_proveedores" style="margin: 0 auto" enctype="multipart/form-data"
                                      action="{{route("cliente.edit",["id"=>$cliente->id])}}"
                                      method="post">
                                        @method("PUT")
                                        @csrf

                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <label style="color: white"><strong>Nombre:</strong></label>
                                        <input class="form-control  @error('nombre_cliente') is-invalid @enderror"
                                               placeholder=""
                                               onkeypress="return valLetra(event);"
                                               pattern="[A-Za-záéíóúñÑ ]{2,50}"
                                               required
                                               @if(old("nombre_cliente"))
                                               value="{{old("nombre_cliente")}}"
                                               @else
                                               value="{{$cliente->nombre_cliente}}"
                                               @endif
                                               maxlength="50" name="nombre_cliente" id="nombre_cliente">
                                        @error('nombre_cliente')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <label style="color: white"><strong>Télefono:</strong></label>
                                        <input class="form-control @error('telefono_cliente') is-invalid @enderror"
                                               placeholder=""
                                               onkeypress="return valNumero(event);"
                                               type="tel"
                                               pattern='\d{8}'
                                               required
                                               @if(old("telefono_cliente"))
                                               value="{{old("telefono_cliente")}}"
                                               @else
                                               value="{{$cliente->telefono_cliente}}"
                                               @endif
                                               maxlength="8"
                                               name="telefono_cliente" id="telefono_cliente">
                                        @error('telefono_cliente')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <br>
                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <button id="btnRegister" class="btn btn-primary">Guardar</button>
                                    </div>
                                    <br>
                                </form>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <script>
            function valNumero(evt) {
                var code = (evt.which) ? evt.which : evt.keyCode;
                if (code == 8) {
                    return true;
                } else if (code >= 48 && code <= 57) {
                    return true;
                } else {
                    return false;
                }
            }

            function valLetra(evt) {
                var code = (evt.which) ? evt.which : evt.keyCode;
                if (code == 8 || code == 32) {
                    return true;
                } else if (code >= 65) {
                    return true;
                } else {
                    return false;
                }
            }

        </script>
@endsection
