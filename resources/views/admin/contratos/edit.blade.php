@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ url('css/uploadfile.css') }}">
    <link href="{{ url('/Trumbowyg/src/ui/trumbowyg.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid revisar">
        <div class="row">
            <div class="col">

                <div class="card card_border py-2 mb-4">
                    <div class="cards__heading">
                        <h3>Crear Contrato <span></span></h3>
                    </div>
                    <div class="card-body">

                        @if(session('message') )
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form 
                            id="crearContacto"
                            action="{{ route('admin.contratos.update', ['id'=>$contrato->id]) }}"
                            method="POST">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="direcciones p-4">

                                <div class=" row">
                                    <label for="inputEmail3" class="col-form-label input__label">Numero de Inscripcion</label>
                                        <input
                                        required
                                        type="text"
                                        class="form-control input-style"
                                        id="inscripcion"
                                        name="inscripcion"
                                        value="{{$contrato->inscripcion}}"
                                        placeholder="Numero de Inscripcion">
                              </div>

                                <div class="row  mt-2  ">

                                    <label for="">Monto</label>
                                    <input
                                        required
                                        type="text"
                                        class="form-control input-style"
                                        id="monto"
                                        name="monto"
                                        value="{{$contrato->monto}}"
                                        placeholder="monto">

                                </div>

                                <div class="row  mt-2">

                                    <label for="">Producto</label>
                                        
                                    <select class="form-control" name="producto_id" id="producto_id">

                                        <option >Seleccione</option>

                                        @foreach($productos as $producto)

                                            <option @if($producto->id==$contrato->producto_id) Selected @endif value="{{$producto->id}}">
                                                {{$producto->titulo}}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="row  mt-2">

                                    <label for="">Grupo</label>
                                        
                                    <select class="form-control" name="grupo_id" id="grupo_id">

                                        <option >Seleccione</option>

                                        @foreach($contratosGrupos  as $grupo)

                                        <option @if($grupo->id==$contrato->grupo_id) Selected @endif value="{{$grupo->id}}">
                                            {{$grupo->nombre}} - Contratos  {{count($grupo->contratos)}}
                                        </option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="row  mt-2">

                                    <label for="">Observaciones del Cliente</label>
                                        
                                    <input
                                        required
                                        type="text"
                                        class="form-control input-style"
                                        id="descripcion"
                                        name="descripcion"
                                        value="{{$contrato->descripcion}}"
                                        placeholder="Descripcion">

                                </div>

                            </div>

                            <div class="row  mt-2">

                                <label for="">Asesor:</label>
                                    
                                <select class="form-control" name="asesor" id="asesor">

                                    <option value=''>Seleccione</option>

                                    @foreach($asesores as $asesor)

                                    <option  @if($asesor->id==$contrato->asesor) Selected @endif  value="{{$asesor->id}}">
                                        {{$asesor->name}} 
                                    </option>

                                    @endforeach

                                </select>

                            </div>

                            <div class="row mt-4">

                                <h3>Gestion de Cuotas 
                                </h3>
                            </div>



                            <div class="row  mt-2">


                                <div class="col-sm-3 mb-1">
                                    
                                   <label for="">Cuota</label>
                                </div>

                                <div class="col-sm-3 mb-1">
                                    
                                    <label for="">Fecha</label>
                                 </div>

                                <div class="col-sm-3 mb-1">
                                    <label for="">Monto</label>
                                </div>

                                <div class="col-sm-3 mb-1">
                                    <label for="">Mora</label>
                                </div>
                                    
                                @foreach($contrato->detalles as $detalle)

                                <div class="col-sm-3 mb-1">
                                    
                                    <input type="text" class="form-control" id="cuota_{{$detalle->id}}" name="cuota_{{$detalle->id}}" readonly value="{{$detalle->cuota}}">
                                </div>

                                <div class="col-sm-3 mb-1">
                                    
                                    <input type="text" class="form-control" id="fecha_{{$detalle->id}}" name="fecha_{{$detalle->id}}" readonly value="{{$detalle->fecha}}">
                                </div>


                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control" id="monto_{{$detalle->id}}" name="monto_{{$detalle->id}}" value="{{$detalle->monto}}" @if($detalle->estatus==1) readonly @endif>
                                </div>

                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control" id="mora_{{$detalle->id}}" name="mora_{{$detalle->id}}" @if($detalle->estatus==1) readonly @endif value="{{$detalle->mora}}">
                                </div>


                                @endforeach

                            </div>





                            <button type="submit" class="btn btn-primary guardarBtn  mt-4">Actualizar Contrato</button>

                           

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="{{ url('/js/jquery.uploadfile.min.js') }}"></script>
    <script src="{{ url('/Trumbowyg/src/trumbowyg.js') }}"></script>
    <script src="{{ url('/Trumbowyg/src/plugins/base64/trumbowyg.base64.js') }}"></script>


    <script>

       

        $(document).ready(function() {
            $('#descripcion').trumbowyg({
                lang: 'es',
                btns: [
                    ['base64'],
                    ['undo', 'redo'],
                    ['formatting'],
                    ['strong', 'em', 'del'],
                    ['link'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['unorderedList', 'orderedList'],
                    ['horizontalRule'],
                    ['removeformat'],
                    ['fullscreen']
                ]
            });
        });

        //validar formulario 
        $(document).ready(function() {

            $('.saveForm').click(function(e) {
                e.preventDefault();
                
                //validar que el fomulario sea valido 

                form = $(this).parents('form');
                
                var datos = form.serializeArray();
                $.ajax({
                    type: form.attr('method'),
                    data: datos,
                    url: form.attr('action'),
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var resultado = data;
                        if (resultado.respuesta == 'exito') {
                            Swal.fire(
                                'Correcto',
                                'Se guardo correctamente',
                                'success'
                            );

                            location.href = '/admin/clientes/' + resultado.id+ '/detail';
                            
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error...',
                                text: resultado.message,
                            })
                        }
                    }
                })
            });

            $('.updateForm').click(function(e) {
                e.preventDefault();
                form = $(this).parents('form');
                var datos = form.serializeArray();
                $.ajax({
                    type: form.attr('method'),
                    data: datos,
                    url: form.attr('action'),
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var resultado = data;
                        if (resultado.respuesta == 'exito') {
                            Swal.fire(
                                'Correcto',
                                'Se actualizo correctamente',
                                'success'
                            );

                            location.href = '/admin/clientes/' + resultado.id+ '/detail';
                            
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error...',
                                text: resultado.message,
                            })
                        }
                    }
                })
            });

            $(document).on('click', '.eliminarTelefono', function(e) {
                e.preventDefault();
                alert('hola');
                cantidad = $('.i_telefono').length;
                if (cantidad > 1) {
                    $(this).parents('.i_telefono').remove();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'Debe tener al menos un telefono',
                    })
                }
            });

        });

        //capturar click de i telefono 

        $('.addTelefono').click(function(e) {

            e.preventDefault();
            /*var html = '';
            html += '<div class="form-group row">';
            html += '<label for="telefono" class="col-sm-2 col-form-label">Telefono</label>';
            html += '<div class="col-sm-10">';
            html += '<input type="text" class="form-control" id="telefono" name="telefono[]" placeholder="Telefono">';
            html += '</div>';
            html += '</div>';*/

            //clonar elemento i_telefono 
            
            var elemento = $('.i_telefono').first().clone();

            //obtener el valor del time stamp
            var time = $.now();

            elemento.find('.telefono').attr('name', 'telefono_' + time + '');
            elemento.find('.telefono').attr('id', 'telefono_' + time + '');
            elemento.find('.tipoTelefono').attr('id', 'tipoTelefono' + time + '');
            elemento.find('.tipoTelefono').attr('id', 'tipoTelefono' + time + '');



            $('.telefonos').append(elemento);
        });

        //adddireccion
        $('.addDireccion').click(function(e) {

            e.preventDefault();
            
            var elemento = $('.i_direccion').first().clone();

            //obtener el valor del time stamp
            var time = $.now();

            elemento.find('.direccion').attr('name', 'direccion_' + time + '');
            elemento.find('.direccion').attr('id', 'direccion_' + time + '');
            elemento.find('.direccion').attr('value', '');
            
            elemento.find('.ciudad').attr('id', 'ciudad_' + time + '');
            elemento.find('.ciudad').attr('name', 'ciudad_' + time + '');
            elemento.find('.ciudad').attr('value', '');

            elemento.find('.urbanizacion').attr('id', 'urbanizacion_' + time + '');
            elemento.find('.urbanizacion').attr('name', 'urbanizacion_' + time + '');
            elemento.find('.urbanizacion').attr('value', '');

            elemento.find('.propiedad').attr('id', 'propiedad_' + time + '');
            elemento.find('.propiedad').attr('name', 'propiedad_' + time + '');
            elemento.find('.propiedad').attr('value', '');

            $('.direcciones').append(elemento);

        });

    </script>
@endsection
