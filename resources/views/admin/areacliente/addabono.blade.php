@extends('layouts.cliente')

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
              <h3>Crear Abono <span></span></h3>
          </div>
          <div class="card-body">

            <div class="row">
                <div class="col">

                    <form
                    action="{{route('admin.areacliente.storeabono')}}"
                    method="post"
                    id="formproducts"
                    class=""
                    enctype="multipart/form-data"
                    >
        
                    @if ($errors->any())
                        <ul class="error-list">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
        
        
                        @csrf
        
                        <input type="hidden" name="id_cliente" id="id_cliente" value="{{$id_cliente}}">
        
                        <div class="form-group row">
                          <div class="previews"></div>
                        </div>
        
                        <div class="form-group row">
                              <label for="inputEmail3" 
                              class="col-sm-2 col-form-label input__label">Fecha del Pago</label>
                              <div class="col-sm-10">
                                  <input
                                  required
                                  type="date"
                                  class="form-control input-style requerido"
                                  id="fecha"
                                  name="fecha"
                                  placeholder="fecha">
                              </div>
                              <span class="text-danger"></span>
                              @if ($errors->has('fecha'))
                                <span class="error-message text-danger">{{ $errors->first('fecha') }}</span>
                                @endif
                        </div>
        
                        <div class="form-group row">
                            <label for="inputEmail3" 
                            class="col-sm-2 col-form-label input__label">Forma de Pago</label>
                            <div class="col-sm-10">
                                <select class="form-control requerido" name="forma_pago" id="forma_pago">
                                    <option >Seleccione</option>
                                    @foreach($formaspago as $fp)
                                    <option value="{{$fp->id}}" data-descripcion="{{$fp->descripcion}}">
                                        {{$fp->nombre}}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                                @if ($errors->has('forma_pago'))
                                <span class="error-message text-danger">{{ $errors->first('forma_pago') }}</span>
                                @endif
                            </div>
                        </div>
        
                      <div class="form-group row">
                            <label for="inputEmail3" 
                            class="col-sm-2 col-form-label input__label">Referencia</label>
                            <div class="col-sm-10">
                                <input
                                required
                                type="text"
                                class="form-control input-style requerido" 
                                id="referencia"
                                name="referencia"
                                placeholder="Referencia">
                                <span class="text-danger"></span>
                                @if ($errors->has('referencia'))
                                <span class="error-message text-danger">{{ $errors->first('referencia') }}</span>
                                @endif
        
                            </div>
                    </div>
        
                    
        
                    <div class="form-group row">
                        <label for="inputEmail3" 
                        class="col-sm-2 col-form-label input__label">Monto</label>
                        <div class="col-sm-10">
                            <input
                            required
                            type="number"
                            step="0.01"
                            class="form-control input-style requerido"
                            id="monto"
                            name="monto"
                            placeholder="Monto">
                            <span class="text-danger"></span>
                            @if ($errors->has('monto'))
                                <span class="error-message text-danger">{{ $errors->first('monto') }}</span>
                            @endif
                        </div>
                </div>
        
        
                    <div class="form-group row">
                        <label for="inputEmail3" 
                        class="col-sm-2 col-form-label input__label">Archivo</label>
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
                                <button type="submit" class="btn btn-primary btn-style saveForm">Crear</button>
                                <a href="{{url('admin/areacliente')}}" class="btn btn-info btn-style">Volver</a>
                                </div>
                          </div>
                      </form>

                </div>
                <div class="col informacionPago">
                    
                </div>
            </div>
            
           
          </div>
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

    $(function(){
        $('#forma_pago').change(function(){
            var selected = $(this).find('option:selected');
            var extra = selected.data('descripcion');
            $('.informacionPago').html('<h1>Informacion de Pago </h1>'+extra);
        });
    });





    var id = $('#id_product').val();

	$("#fileuploader").uploadFile({
	    url:"{{url('/admin/products/uploadimg/')}}/"+id,
	    fileName:"myfile",
        onLoad:function(obj)
        {
                $("#listimagenes").html("<br/>Widget Loaded:");
        },
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
});


$(document).ready(function() {

    $('.updateForm').click(function(e) {

        e.preventDefault();

        if(ban){
            
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

        }
        
    });

});

</script>

@endsection