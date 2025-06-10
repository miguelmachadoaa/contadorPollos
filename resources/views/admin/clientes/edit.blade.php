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
                        <h3>Editar Cliente <span></span></h3>
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

        //validar formulario 
        $(document).ready(function() {
            $('#crearCliente').submit(function(e) {
                e.preventDefault();
                var datos = $(this).serializeArray();
                $.ajax({
                    type: $(this).attr('method'),
                    data: datos,
                    url: $(this).attr('action'),
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
        });
    </script>
@endsection
