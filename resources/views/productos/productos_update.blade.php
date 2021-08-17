@extends('layouts.app')
@section('title', 'Producto')
@section('content')
    <div class="container">
        <div class="row" style="margin-top: 15px">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"
                 style="margin: 0 auto">

                <div class="col" style="margin: 0 auto">
                    <ul class="list-group" style="width: 33rem; margin: 0 auto">
                        <li class="list-group-item" style="background-color:#d84315">
                            <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">
                            <h2 style="color:#ffffff; text-align: center">
                                EDITAR PRODUCTO
                            </h2>
                            <hr style="border-top: 2px solid white; border-bottom: 2px solid white; border-left:none; border-right:none; height: 2px; ">


                            <div class="col-md-11" style="margin: 0 auto">
                                <form id="form_proveedores" style="margin: 0 auto" enctype="multipart/form-data"
                                      action="{{route("producto.edit",["id"=>$producto->id])}}"
                                      method="post">
                                    @method("PUT")
                                    @csrf

                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <label style="color: white"><strong>Nombre:</strong></label>
                                        <input class="form-control  @error('nombre_producto') is-invalid @enderror"
                                               placeholder=""
                                               onkeypress="return valLetra(event);"
                                               pattern="[A-Za-záéíóúñÑ ]{2,50}"
                                               title="No se permiten números"
                                               required
                                               @if(old("nombre_producto"))
                                               value="{{old("nombre_producto")}}"
                                               @else
                                               value="{{$producto->nombre_producto}}"
                                               @endif
                                               maxlength="50" name="nombre_producto" id="nombre_producto">
                                        @error('nombre_producto')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <label style="color: white"><strong>Categoria:</strong></label>
                                        <input class="form-control  @error('categoria_producto') is-invalid @enderror"
                                               placeholder=""
                                               onkeypress="return valLetra(event);"
                                               pattern="[A-Za-záéíóúñÑ ]{2,50}"
                                               required
                                               title="Solo se permite texto"
                                               @if(old("categoria_producto"))
                                               value="{{old("categoria_producto")}}"
                                               @else
                                               value="{{$producto->categoria_producto}}"
                                               @endif
                                               maxlength="50" name="categoria_producto" id="categoria_producto">
                                        @error('categoria_producto')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <label style="color: white"><strong>Precio de Compra:</strong></label>
                                        <input class="form-control  @error('precio_compra') is-invalid @enderror"
                                               placeholder=""
                                               onkeypress="return valNumero(event);"
                                               pattern="[0-9,]{1,20}"
                                               title="El precio de compra debe ser menor al precio de venta"
                                               required
                                               @if(old("precio_compra"))
                                               value="{{old("precio_compra")}}"
                                               @else
                                               value="{{$producto->precio_compra}}"
                                               @endif
                                               maxlength="20" name="precio_compra" id="precio_compra">
                                        @error('precio_compra')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="d-grid gap-2" style="margin: 0 auto">
                                        <label style="color: white"><strong>Precio de Venta:</strong></label>
                                        <input class="form-control  @error('precio_venta') is-invalid @enderror"
                                               placeholder=""
                                               onkeypress="return valNumero(event);"
                                               pattern="[0-9,]{1,20}"
                                               title="El precio de venta debe ser mayor al precio de compra"
                                               required
                                               @if(old("precio_venta"))
                                               value="{{old("precio_venta")}}"
                                               @else
                                               value="{{$producto->precio_venta}}"
                                               @endif
                                               maxlength="20" name="precio_venta" id="precio_venta">
                                        @error('precio_venta')
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
