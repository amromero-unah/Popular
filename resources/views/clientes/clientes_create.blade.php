@extends('layouts.app')
@section('title', 'Clientes')
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
                                REGISTRAR CLIENTE
                            </h2>
                            <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">


                            <div class="col-md-11" style="margin: 0 auto">
                                <form id="form_proveedores" style="margin: 0 auto" enctype="multipart/form-data"
                                      action="{{route("cliente.create")}}"
                                      method="post">
                                    @csrf

                                    <!--
                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <label style="color: white"><strong>ID:</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="text"
                                                   class="form-control"
                                                   placeholder="Generar ID"
                                                   aria-label="Disabled input example"
                                                   disabled
                                                   readonly
                                                   value="{{old("id_cliente")}}"
                                                   maxlength="8" name="id_cliente" id="id_cliente">
                                            <div style="margin-left: 10px" class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                                        <path
                                                            d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        @error('id_cliente')
                                        <span class="invalid-feedback" style="color: white" role="alert">
                                        <strong style="color: white">{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                     -->

                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <label style="color: white"><strong>Nombre:</strong></label>
                                        <input class="form-control  @error('nombre_cliente') is-invalid @enderror"
                                               placeholder=""
                                               onkeypress="return valLetra(event);"
                                               pattern="[A-Za-záéíóúñÑ ]{2,50}"
                                               required
                                               value="{{old("nombre_cliente")}}"
                                               maxlength="50" name="nombre_cliente" id="nombre_cliente">
                                        @error('nombre_cliente')
                                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: white">{{ $message }}</strong>
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
                                               onkeypress="return valideKey(event);"
                                               required
                                               value="{{old("telefono_cliente")}}"
                                               maxlength="8"
                                               name="telefono_cliente" id="telefono_cliente">
                                        @error('telefono_cliente')
                                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: white">{{ $message }}</strong>
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
