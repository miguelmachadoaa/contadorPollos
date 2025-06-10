@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<link rel="stylesheet" href="{{url('css/uploadfile.css')}}">
<link href="{{url('/Trumbowyg/src/ui/trumbowyg.css')}}" rel="stylesheet">
@endsection

@section('content')

  <div class="container-fluid revisar">
   <div class="row ">
    <div class="col-sm-4 detalleCliente">
        @include('admin.clientes.detalle-cliente')
        @include('admin.clientes.archivos')
    </div>
    <div class="col-sm-8">


        <div class="card card_border py-2 mb-2">
            <div class="cards__heading mb-0 ">
                <h3>Contratos <span></span></h3>
            </div>
            <div class="card-body p-0 m-0">

                @if(count($cliente->contratos))

                    @foreach($cliente->contratos as $contrato)

                    <div 
                    class="contratoDetail{{$contrato->id}} {{($contrato->estatus == 'adjudicado')?'bg-adjudicado':''}}"
                    >
                        @include('admin.clientes.contrato')
                    </div>

                    @endforeach

                @else

                    <div class="row p-2 m-0">
                        <div class="col-sm-12">
                            <h3>No posee contratos</h3>
                        </div>
                    </div>

                @endif
                
            </div>
        </div>

        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button 
                  class="btn btn-link btn-block text-left" 
                  type="button" 
                  data-toggle="collapse" 
                  data-target="#collapseOne" 
                  aria-expanded="true" 
                  aria-controls="collapseOne">
                    Pagos
                  </button>
                </h2>
              </div>
          
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  
                    @include('admin.pagos.table')
                    
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button 
                  class="btn btn-link btn-block text-left collapsed" 
                  type="button" 
                  data-toggle="collapse" 
                  data-target="#collapseTwo" 
                  aria-expanded="false" 
                  aria-controls="collapseTwo">
                    Abonos
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  
                    @include('admin.abonos.table')

                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button 
                  class="btn btn-link btn-block text-left collapsed" 
                  type="button" 
                  data-toggle="collapse" 
                  data-target="#collapseThree" 
                  aria-expanded="false" 
                  aria-controls="collapseThree">
                    Datos Personales
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  
                    <div class="card card_border py-2 mb-2">
                        <div class="cards__heading mb-0 ">
                            <h3>Datos personales <span></span></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>email</p>
                                    <h4>{{$cliente->email}}</h4>
                                </div>
                                <div class="col-sm-6">
                                    <p>Genero</p>
                                    <h4>{{$cliente->sexo}}</h4>
                                </div>
                                
                            </div>
            
                            <div class="row">
                                
                                <div class="col-sm-6">
                                    <p>Estado civil</p>
                                    <h4>{{$cliente->estado_civil}}</h4>
                                </div>
                                <div class="col-sm-6">
                                    <p>Documento</p>
                                    <h4>{{$cliente->documento}}</h4>
                                </div>
                                
                                
                            </div>
            
                            <div class="row">
            
                                @if(count($cliente->telefonos))
            
                                    @foreach($cliente->telefonos as $telefono)
                                        <div class="col-sm-6">
            
                                            <p>{{$telefono->tipo}}</p>
            
                                            <h4>{{$telefono->telefono}}</h4>
                                        </div>
                                    @endforeach
                                @endif
            
                            </div>
            
                        </div>
                    </div>
            
                    <div class="card card_border py-2 mb-2">
                        <div class="cards__heading mb-0 ">
                            <h3>Direcciones <span></span></h3>
                        </div>
                        <div class="card-body">
                            
            
                            <div class="row">
                                    @if(count($cliente->direcciones))
                                        @foreach($cliente->direcciones as $direccion)
                                        <div class="col-sm-6">
                                            <p>Direccion</p>
            
                                            <h4>{{$direccion->direccion}}</h4>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>Urbanizacion</p>
                                            <h4>{{$direccion->urbanizacion}}</h4>
                                        </div>
            
                                        <div class="col-sm-6">
                                            <p>Estado</p>
                                            <h4>{{$direccion->estado}}</h4>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>Ciudad</p>
                                            <h4>{{$direccion->ciudad}}</h4>
                                        </div>
            
                                        <div class="col-sm-6">
                                            <p>propiedad</p>
                                            <h4>{{$direccion->propiedad}}</h4>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>Telefono</p>
                                            <h4>{{$direccion->telefono}}</h4>
                                        </div>
                                            
                                        @endforeach
                                    @endif
                                
                            </div>
            
            
                            
                        </div>
                    </div>
            
            
                    <div class="card card_border py-2 mb-2">
                        <div class="cards__heading mb-0 ">
                            <h3>Trabajos <span></span></h3>
                        </div>
                        <div class="card-body">
            
                            <div class="row">
            
                                @if(count($cliente->empleo))
            
                                    @foreach($cliente->empleo as $trabajo)
                                        <div class="col-sm-6">
                                            <p>Nombre</p>
            
                                            <h4>{{$trabajo->nombre_empresa}}</h4>
            
                                        </div>
            
                                        <div class="col-sm-6">
                                            <p>Telefono</p>
                                            <h4>{{$trabajo->telefono_empresa}}</h4>
                                        </div>
            
                                        <div class="col-sm-6">
                                            <p>Direccion</p>
                                            <h4>{{$trabajo->direccion_empresa}}</h4>
            
                                        </div>
            
                                        <div class="col-sm-6">
                                            <p>Fecha de ingreso</p>
                                            <h4>{{$trabajo->fecha_ingreso}}</h4>
            
                                        </div>
                                        <div class="col-sm-6">
                                            <p>Salario</p>
                                            <h4>{{$trabajo->salario}}</h4>
            
                                        </div>
            
                                        <div class="col-sm-6">
                                            <p>cargo</p>
                                            <h4>{{$trabajo->cargo}}</h4>
            
                                        </div>
                                    
                                    @endforeach
            
                                @endif
                                
                            </div>
                            
                        </div>
                    </div>
            
                    <div class="card card_border py-2 mb-2">
                        <div class="cards__heading mb-0  ">
                            <h3>Referencias <span></span></h3>
                        </div>
                        <div class="card-body">
            
                            <div class="row">
            
                                @if(count($cliente->referencias))
            
                                    @foreach($cliente->referencias as $referencia)
                                        <div class="col-sm-4">
                                            <p>Nombre</p>
                                            <h4>{{$referencia->nombre}}</h4>
                                        </div>
            
                                        <div class="col-sm-4">
                                            <p>Telefono</p>
                                            <h4>{{$referencia->telefono}}</h4>
                                        </div>
            
                                        <div class="col-sm-4">
                                            <p>Parentesco</p>
                                            <h4>{{$referencia->parentesco}}</h4>
            
                                        </div>
                                    
                                    @endforeach
            
                                @endif
                                
                            </div>
                            
                        </div>
                    </div>
                    
                    
                </div>
              </div>
            </div>
          </div>

        



    </div>
   </div>



  </div>

  <div class="modal" tabindex="-1" id="modalAddPago">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Crear Pago de Deferencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="hidden" id="contratoIdPago" name="contratoIdPago" value="">
                    <label for="exampleInputEmail1">Agregar Pago de Diferencia</label>
                    <input type="number" step="1" min="0" class="form-control" id="montoPago" name="montoPago" aria-describedby="emailHelp">
                    <div class="errorMontoPago">

                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
          <button data-id="{{$cliente->id}}" type="button" class="btn btn-primary btnSavePago">Guardar</button>
        </div>
      </div>
    </div>
  </div>





  <div class="modal" tabindex="-1" id="modalAddDiferencia">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Diferencia </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="hidden" id="contratoId" name="contratoId" value="">
                    <label for="exampleInputEmail1">Agregar Monto de Diferencia</label>
                    <input type="number" step="1" min="0" class="form-control" id="montoDiferencia" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Diferencia entre precio del producto y el contrato.</small>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
          <button data-id="{{$cliente->id}}" type="button" class="btn btn-primary btnSaveDiferenica">Guardar</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal" tabindex="-1" id="modalPagarCuota">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pagar Cuota </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body body-cuota">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1"  id="modalUpdatePhoto">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Actualizar Foto de Perfil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
            <form
            action="{{route('admin.clientes.updatePhoto')}}"
            method="post"
            id="formproducts"
            class=""
            enctype="multipart/form-data"
            >

            @csrf

            <input type="hidden" name="id_cliente" id="id_cliente" value="{{$cliente->id}}">

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Archivo</label>
                <div class="col-sm-10">
                    <input class="form-control requerido" id="myfile" name="myfile" type="file" >
                    <span class="text-danger"></span>
                    @if ($errors->has('myfile'))
                        <span class="error-message text-danger">{{ $errors->first('myfile') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-style saveForm">Actualizar</button>
                </div>
            </div>

            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="{{url('/js/jquery.uploadfile.min.js')}}"></script>
<script src="{{url('/Trumbowyg/src/trumbowyg.js')}}"></script>
<script src="{{url('/Trumbowyg/src/plugins/base64/trumbowyg.base64.js')}}"></script>
<script>

var urlCuota = "{{route('admin.pagos.cuota')}}";
var urlActualizarContrato = "{{route('admin.contratos.actualizar')}}";
var urlProcesar = "{{route('admin.pagos.procesar')}}";
var urlPagosAdd = "{{route('admin.pagos.store')}}";
var urlContratoEstatus = "{{route('admin.contratos.estatus')}}";
var UrlClienteDetalle = "{{route('admin.clientes.detalle', ['id'=>$cliente->id])}}";
var UrlClienteUploadImagen = "{{route('admin.clientes.uploadimg', ['id'=>$cliente->id])}}";


$(document).ready(function()
{

    $('.updatePhoto').on('click', function(){
        $('#modalUpdatePhoto').modal('show');
    })

    function cargarCliente(){

        $.ajax({
            type: 'get',
            url: UrlClienteDetalle,
            success: function(data) {
                $('.detalleCliente').html(data);
            }
        });
    }

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


    var id = $('#cliente_id').val();

	$("#fileuploader").uploadFile({
	    url:UrlClienteUploadImagen,
	    fileName:"myfile",
        onSubmit:function(files)
        {
            $("#listArchivos").html("<br/>Submitting:"+JSON.stringify(files));
            //return false;
        },
        onSuccess:function(files,data,xhr,pd)
        {
            $('.ajax-file-upload-container').fadeOut();
            $("#listArchivos").html(data);
        }
	});

    

    $(document).on('click', '.pagarCuota', function(){

        var id = $(this).data('id');
        var last = 0;

        $.ajax({
            type: 'Post',
            data: {id, last},
            url: urlCuota,
            success: function(data) {
                $('.body-cuota').html(data);
                $('#modalPagarCuota').modal('show');
            }
            
        });

    });


    $(document).on('change', '#estado_contrato', function(){

        var id = $(this).data('id');
        var estatus = $(this).val();
        $.ajax({
            type: 'Post',
            data: {id, estatus},
            url: urlContratoEstatus,
            success: function(data) {
            }
            
        });

    });

    $(document).on('click', '.pagarCuotaLast', function(){

        var id = $(this).data('id');
        var last = 1;

        $.ajax({
            type: 'Post',
            data: {id, last},
            url: urlCuota,
            success: function(data) {
                $('.modal-body').html(data);
                $('#modalPagarCuota').modal('show');
            }
            
        });

    });

    $(document).on('click','.procesarCuota',  function(){

        var id = $(this).data('id');
        var contrato = $(this).data('contrato');
        var last = $(this).data('last');
        var fecha_pago = $('#fecha_pago').val();

        console.log(fecha_pago);

        $.ajax({
            type: 'Post',
            data: {id, last, fecha_pago},
            url: urlProcesar,
            success: function(data) {

                $('.contratoDetail'+contrato+'').html(data);
                $('#modalPagarCuota').modal('hide');

                cargarCliente();

            }
            
        });

    });

    $(document).on('click', '.btnAddDiferencia', function(){

        var id = $(this).data('id');
        var contrato = $(this).data('contrato');

        $('#contratoId').val(contrato);

        $('#modalAddDiferencia').modal('show');

    });



    $(document).on('click','.btnSaveDiferenica',  function(){

            var id = $('#contratoId').val();
            var diferencia = $('#montoDiferencia').val();

            $.ajax({
                type: 'Post',
                data: {id, diferencia},
                url: urlActualizarContrato,
                success: function(data) {

                    location.reload();

                }
                
            });

        });

    });

    $(document).on('click', '.addPago', function(){

        var contrato = $(this).data('contrato');
        $('#contratoIdPago').val(contrato);

        $('#modalAddPago').modal('show');

    });

    $(document).on('click','.btnSavePago',  function(){

        var cliente_id = $(this).data('id');
        var cuota_id = $('#contratoIdPago').val();
        var monto = $('#montoPago').val();
        var type_id = cuota_id;
        var type = 'diferencia';
        var observaciones = 'Pago diferencia en contrato '+type_id;

        if(monto == '' || monto == ' ' || monto==undefined || monto == null ){
            $('.errorMontoPago').html('<div class="alert alert-danger mt-2">El monto no puede estar vacio.</div>');
            return true;
        }

        $.ajax({
            type: 'Post',
            data: {cliente_id, cuota_id, monto, type_id, type, observaciones},
            url: urlPagosAdd,
            success: function(data) {

                    location.reload();

            }
            
        });

    });


</script>

@endsection