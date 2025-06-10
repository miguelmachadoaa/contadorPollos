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
                        <h3>Crear Cliente <span></span></h3>
                    </div>
                    <div class="card-body">

                        @include('admin.clientes.formulario')

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
            $('#observaciones').trumbowyg({
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

        function validarCampoAlfanumerico(value) {
            return isNaN(value);
        }

        

        
        
        //validar formulario 
        $(document).ready(function() {

            $('.saveForm').click(function(e) {
                e.preventDefault();

                if(!validarRequerido()){

                }else{


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



                }

                
                //validar que el fomulario sea valido 

                
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
