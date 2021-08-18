@extends('layouts.app')
@section('title', 'Proveedores')
@section('content')
    <div class="container">

        <div class="row" style="margin-top: 15px">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"
                 style="margin: 0 auto">

                <div class="col" style="margin: 0 auto">
                    <ul class="list-group" style="width: 33rem; margin: 0 auto">
                        <li class="list-group-item" style="background-color:#e9871e">
                            <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">
                            <h2 style="color:#ffffff; text-align: center">
                                REGISTRAR PROVEEDOR
                            </h2>
                            <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">


                            <div class="col-md-11" style="margin: 0 auto">
                                <form id="form_proveedores" style="margin: 0 auto" enctype="multipart/form-data"
                                      action="{{route("proveedor.create")}}"
                                      method="post">
                                    @csrf


                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <label style="color: white"><strong>Nombre:</strong></label>
                                        <input class="form-control  @error('nombre_proveedor') is-invalid @enderror"
                                               placeholder=""
                                               onkeypress="return valLetra(event);"
                                               pattern="[A-Za-záéíóúñÑ ]{2,50}"
                                               required
                                               value="{{old("nombre_proveedor")}}"
                                               maxlength="50" name="nombre_proveedor" id="nombre_proveedor">
                                        @error('nombre_cliente')
                                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: white">{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <label style="color: white"><strong>Correo:</strong></label>
                                        <input class="form-control  @error('correo_proveedor') is-invalid @enderror"
                                               placeholder=""
                                               onkeypress=""
                                               pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"
                                               required
                                               value="{{old("correo_proveedor")}}"
                                               maxlength="50" name="correo_proveedor" id="correo_proveedor">
                                        @error('correo_proveedor')
                                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: white">{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <label style="color: white"><strong>Télefono:</strong></label>
                                        <input class="form-control @error('telefono_proveedor') is-invalid @enderror"
                                               placeholder=""
                                               onkeypress="return valNumero(event);"
                                               type="tel"
                                               pattern='\d{8}'
                                               onkeypress="return valideKey(event);"
                                               required
                                               value="{{old("telefono_proveedor")}}"
                                               maxlength="8"
                                               name="telefono_proveedor" id="telefono_proveedor">
                                        @error('telefono_proveedor')
                                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: white">{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <label style="color: white"><strong>Nombre Contacto:</strong></label>
                                        <input class="form-control  @error('nombre_contacto_proveedor') is-invalid @enderror"
                                               placeholder=""
                                               onkeypress="return valLetra(event);"
                                               pattern="[A-Za-záéíóúñÑ ]{2,50}"
                                               required
                                               value="{{old("nombre_contacto_proveedor")}}"
                                               maxlength="50" name="nombre_contacto_proveedor" id="nombre_contacto_proveedor">
                                        @error('nombre_contacto_proveedor')
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
