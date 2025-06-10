@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<link rel="stylesheet" href="{{url('css/uploadfile.css')}}">
<link href="{{url('/Trumbowyg/src/ui/trumbowyg.css')}}" rel="stylesheet">
@endsection

@section('content')

  <div class="container-fluid revisar">
   <div class="row">
    <div class="col-sm-4 detalleCliente">
        @include('admin.clientes.detalle-cliente')
    </div>
    <div class="col-sm-8">


        <div class="card card_border py-2 mb-2">
            <div class="cards__heading mb-0 ">
                <h3>Abono <span></span></h3>
            </div>
            <div class="card-body">

                @if(isset($abono->id))


                <div class="row">
                    <div class="col-sm-12">
                        <p>Monto del Abono</p>
                        @if($abono->formapago->moneda=='VES')

                            <h4>{{$abono->monto_bs}} BS. / {{$abono->monto}} USD</h4>

                        @else
                        <h4>{{$abono->monto}}</h4>

                        @endif
                    </div>

                    @if($abono->formapago->moneda=='VES')
                        
                        <div class="col-sm-12">
                            <p>Tasa del Dia <button class="btn btn-sm btn-link updateTasa"><i class="fa fa-edit "></i></button> </p>
                            <h4>{{$abono->tasa}} Bs  </h4>
                            
                        </div>

                    @endif


                    <div class="col-sm-12">
                        <p>Fecha</p>
                        <h4>{{$abono->fecha}}</h4>
                    </div>

                    <div class="col-sm-12">
                        <p>Referencia</p>
                        <h4>{{$abono->referencia}}</h4>
                    </div>

                    <div class="col-sm-12">
                        <p>Forma de Pago</p>
                        <h4>{{$abono->formapago->nombre.' - '.$abono->formapago->moneda}}</h4>
                    </div>

                    <div class="col-sm-12">
                        <p>Archivo Referencia </p>
                        <h4>
                            <a target="_blank" href="/uploads/abonos/{{$abono->archivo}}">
                                <img src="/uploads/abonos/{{$abono->archivo}}" alt="Imagen" width="60px">
                            </a>
                        </h4>
                    </div>

                    <div class="col-sm-12">
                        <p>Revisado por: </p>
                        @if($abono->actualizado)
                            <h4>{{$abono->actualizado->name}}</h4>
                        @endif
                    </div>

                    <hr>

                    <form action="{{route('admin.abonos.status')}}" method="post" class="row">

                        <input type="hidden" name="id" id="id" value="{{$abono->id}}">

                        <div class="col-sm-6">
                            <p>Estado del Abono</p>
                            <select class="form-control " id="estado_abono" name="estado_abono">
                                <option @if($abono->estatus == 0) Selected @endif   value="0">Espera de Revision</option>
                                <option @if($abono->estatus == 1) Selected @endif  value="1">Aprobado</option>
                                <option @if($abono->estatus == 2) Selected @endif  value="2">Rechazado</option>
                            </select>
                        </div>

                        <div class="col-sm-6 mb-4"></div>

                        <div class="col-sm-6 mb-4">
                            <p for="inputEmail3">Observaciones</p>
                            <div class="col-sm-12">
                                <input
                                required
                                type="text"
                                class="form-control input-style"
                                id="observaciones"
                                name="observaciones"
                                value="{{$abono->observaciones}}"
                                placeholder="Observaciones">
                            </div>
                    </div>


                        <div class="col-sm-12">
                            @if(Auth::user()->rol==1 || Auth::user()->rol==2 )
                                @if($abono->estatus == 0 )
                                    <button type="submit" class="btn btn-primary btn-style saveForm">Actualizar Estado</button>
                                @endif
                            @endif
                            <a href="{{url('admin/abonos')}}" class="btn btn-info btn-style">Volver</a>
                            <a href="{{url('admin/clientes/'.$abono->cliente_id.'/detail')}}" class="btn btn-info btn-style">Ir al Detalle Cliente</a>
                        </div>

                </form>

                    
                </div>

                @else

                <div class="row">
                    <div class="col-sm-12">
                        <h3>No se encuentra el abono</h3>
                    </div>
                </div>
                @endif
                
            </div>

        </div>

    </div>

   </div>

  </div>

  
  <div class="modal" tabindex="-1" id="modalUpdateTasa">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Actualizar Tasa de Abono</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="hidden" id="contratoIdPago" name="contratoIdPago" value="">
                    <label for="exampleInputEmail1">Nueva Tasa de Abono</label>
                    <input type="number" step="1" min="0" class="form-control" id="tasa" name="tasa" aria-describedby="emailHelp">
                    <div class="errorTasa">

                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
          <button data-id="{{$abono->id}}" type="button" class="btn btn-primary btnSaveTasa">Guardar</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="{{url('/js/jquery.uploadfile.min.js')}}"></script>
<script src="{{url('/Trumbowyg/src/trumbowyg.js')}}"></script>
<script src="{{url('/Trumbowyg/src/plugins/base64/trumbowyg.base64.js')}}"></script>



<script>

var urlAbonosUpdate = "{{route('admin.abonos.updatetasa', ['id'=>$abono->id])}}";

$(document).on('click', '.updateTasa', function(){

    $('#modalUpdateTasa').modal('show');

});

$(document).on('click','.btnSaveTasa',  function(){

    var abono_id = $(this).data('id');
    var tasa = $('#tasa').val();

    if(tasa == '' || tasa == ' ' || tasa==undefined || tasa == null ){
        $('.errorTasa').html('<div class="alert alert-danger mt-2">El monto no puede estar vacio.</div>');
        return true;
    }

    $.ajax({
        type: 'Post',
        data: {abono_id, tasa},
        url: urlAbonosUpdate,
        success: function(data) {
                location.reload();
        }
        
    });

});




$(document).ready(function()
{

    

    $('#descripcion')
    .trumbowyg({
    btnsDef: {
        // Create a new dropdown
        image: {
            dropdown: ['insertImage', 'base64'],
            ico: 'insertImage'
        }
    },
        // Redefine the button pane
        btns: [
            ['viewHTML'],
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['link'],
            ['image'], // Our fresh created dropdown
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['unorderedList', 'orderedList'],
            ['horizontalRule'],
            ['removeformat'],
            ['fullscreen']
        ]
    });


    var id = $('#id_product').val();

	$("#fileuploader").uploadFile({
	    url:"{{url('/admin/products/uploadimg/')}}/"+id,
	    fileName:"myfile",
        onSubmit:function(files)
        {
            $("#listimagenes").html("<br/>Submitting:"+JSON.stringify(files));
            //return false;
        },
        onSuccess:function(files,data,xhr,pd)
        {

            $("#listimagenes").html(data);
            
        }
	});


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

                    //$('.saveForm').fadeOut();

                    location.reload();

                   // location.href = '/admin/clientes/' + resultado.id+ '/detail';
                    
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