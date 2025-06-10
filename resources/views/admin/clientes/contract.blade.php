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
                            action="{{ route('admin.clientes.postcontract', ['id'=>$cliente->id]) }}"
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

                            <input type="hidden" name="saldo" id="saldo" value="{{$cliente->saldo_cliente}}">

                            <div class="direcciones p-4">

                                <div class=" row">
                                    <label for="inputEmail3" class="col-form-label input__label">Numero de Inscripcion</label>
                                        <input
                                        required
                                        type="text"
                                        class="form-control input-style"
                                        id="inscripcion"
                                        name="inscripcion"
                                        value=""
                                        placeholder="Numero de Inscripcion">
                              </div>



                                <div class=" row">
                                    <label for="inputEmail3" class="col-form-label input__label">Fecha de Creacion de contrato</label>
                                        <input
                                        required
                                        type="date"
                                        class="form-control input-style"
                                        id="fecha_creacion"
                                        name="fecha_creacion"
                                        value="{{date('Y-m-d')}}"
                                        placeholder="fecha_creacion">
                              </div>

                                <div class="row  mt-2">

                                    <label for="">Tipo</label>

                                    <select class="form-control" name="tipo" id="tipo">

                                        @foreach($contratoTipos as $tipo)

                                        <option value="{{$tipo->id}}">
                                            {{$tipo->nombre}} - {{$tipo->cuotas}} Cuotas
                                        </option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="row  mt-2">

                                    <label for="">Rango</label>
                                        
                                    <select class="form-control" name="categoria" id="categoria">

                                        <option >Seleccione</option>

                                        @foreach($contratoCategorias as $categoria)

                                        <option value="{{$categoria->monto}}">
                                            {{$categoria->nombre}} - {{$categoria->monto}}
                                        </option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="row  mt-2 fieldMonto d-none">

                                    <label for="">Monto</label>
                                    <input
                                        required
                                        type="text"
                                        class="form-control input-style"
                                        id="monto"
                                        name="monto"
                                        placeholder="monto">

                                </div>

                                <div class="row  mt-2">

                                    <label for="">Producto</label>
                                        
                                    <select class="form-control" name="producto_id" id="producto_id">

                                        <option >Seleccione</option>

                                        @foreach($productos as $producto)

                                        <option value="{{$producto->id}}">
                                            {{$producto->titulo}}
                                        </option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="row  mt-2">

                                    <label for="">Descripción del producto</label>
                                        
                                    <input
                                        required
                                        type="text"
                                        class="form-control input-style"
                                        id="descripcion"
                                        name="descripcion"
                                        placeholder="Descripcion">

                                </div>




                                <div class="row  mt-2">

                                    <label class="col-sm-12" for="">Grupo</label>
                                        
                                    <select class="form-control col-sm-10 mr-1" name="grupo_id" id="grupo_id">

                                        <option >Seleccione</option>

                                        @foreach($contratosGrupos  as $grupo)

                                        <option value="{{$grupo->id}}">
                                            {{$grupo->nombre}} - Contratos {{count($grupo->contratos)}}
                                        </option>

                                        @endforeach

                                    </select>

                                    <button type="button" class="btn btn-primary addGrupo">
                                        +
                                    </button>

                                </div>



                               
                                <div class="row  mt-2">

                                    <label for="">Asesor:</label>
                                        
                                    <select class="form-control select2" name="asesor" id="asesor">

                                        <option value=''>Seleccione</option>

                                        @foreach($asesores as $asesor)

                                        <option value="{{$asesor->id}}">
                                            {{$asesor->name}} 
                                        </option>

                                        @endforeach

                                    </select>

                                </div>

                              
                            </div>

                            <button type="submit" class="btn btn-primary guardarBtn  mt-4">Crear Contrato</button>

                            <div class="alert alert-danger guardarMsg d-none">
                                No tienes saldo disponible para crear el contrato. 
                                <a
                                href="{{route('admin.abonos.add', $cliente->id)}}"
                                class="btn btn-dark "><i class="fa fa-document"> Agregar Abono</i> </a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="modalAddGrupo">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Crear Grupo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre de Grupo</label>
                        <input type="text" class="form-control" id="nombreGrupo" name="nombreGrupo" aria-describedby="emailHelp">
                        <div class="errorGrupo">
    
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
              <button  type="button" class="btn btn-primary btnSaveGrupo">Guardar</button>
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

        $('.addGrupo').on('click', function(){

            $('#modalAddGrupo').modal('show');
        });

        $('.btnSaveGrupo').on('click', function(){

            var grupo = $('#nombreGrupo').val();


            $.ajax({
                    type: 'POST',
                    data:  {nombre:grupo},
                    url: '{{route('admin.contratos_grupos.save')}}',
                    success: function(data) {
                        $('#grupo_id').html(data);
                        $('#modalAddGrupo').modal('hide');
                    }
                })

        })

        $('#categoria').on('change', function(){

            var categoria = $(this).val();
            let monto = $('#categoria').val();

            if(categoria == '0'){

                $('.fieldMonto').removeClass('d-none');

            }else{

                $('.fieldMonto').addClass('d-none');
                $('#monto').val(monto);
                $('#costo').val(Math.round(monto*0.08));
            }

            verificarBoton();

        });

        $('#monto').on('change', function(){

            let monto = $(this).val();

            $('#costo').val(Math.round(monto*0.08));

           verificarBoton();

        });

        function verificarBoton(){
            let saldo = $('#saldo').val();
            let monto = $('#monto').val();
            let costo = Math.round(monto*0.08);

            /*if(saldo>=costo){
                $('.guardarBtn').removeClass('d-none');
                $('.guardarMsg').addClass('d-none');
            }else{
                $('.guardarBtn').addClass('d-none');
                $('.guardarMsg').removeClass('d-none');
            }*/

        }

        $(document).ready(function() {
            $('#descripcionOLd').trumbowyg({
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
