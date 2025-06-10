@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<link rel="stylesheet" href="{{url('css/uploadfile.css')}}">
<link href="{{url('/Trumbowyg/src/ui/trumbowyg.css')}}" rel="stylesheet">


@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        
        <div class="card card_border py-2 mb-4">
          <div class="cards__heading">
              <h3>Crear Destino <span></span></h3>
          </div>
          <div class="card-body">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            
            <form
            action="{{route('admin.destinos.store')}}"
            method="post"
            id="formproducts"
            class=""
            enctype="multipart/form-data"
            >

                @csrf

                <div class="form-group row">
                  <div class="previews"></div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Titulo</label>
                    <div class="col-sm-10">
                        <input
                        required
                        type="text"
                        min="0"
                        step="0.01"
                        class="form-control input-style"
                        id="titulo"
                        name="titulo"
                        placeholder="valor">
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Descripcion</label>
                    <div class="col-sm-10">
                        <textarea
                        class="form-control "
                        id="descripcion"
                        name="descripcion"
                        rows="3">
                        </textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Idioma</label>
                    <div class="col-sm-10">
                        <select class="form-control requerido" id="idioma" name="idioma" required>
                            <option value="es">Español</option>
                            <option value="en">Ingles</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Pais</label>
                    <div class="col-sm-10">
                        <select class="form-control requerido" id="pais" name="pais" required>
                            <option value="">Seleccione</option>
                            @foreach($paises as $pais)
                                <option value="{{$pais->sortname}}">{{$pais->country_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Posicion</label>
                    <div class="col-sm-10">
                        <input
                        required
                        type="text"
                        min="1"
                        step="1"
                        class="form-control input-style"
                        id="order"
                        name="order"
                        placeholder="Posicion">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Imagen Principal</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="myfile" name="myfile">
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Galeria de Imagenes</label>
                    <div class="col-sm-10">

                        <input type="hidden" name="id_imagen" id="id_imagen" value="{{time()}}">
                        <input type="hidden" name="type" id="type" value="destino">
                        
                        <div class="form-group row">
                                <div id="fileuploader">Upload</div>
                        </div>
                
                        <div class="form-group row">
                            <div id="listimagenes">
                                
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group row">
                      <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary btn-style">Crear</button>
                          <a href="{{url('admin/destinos')}}" class="btn btn-info btn-style">Volver</a>
                      </div>
                  </div>
              </form>
          </div>
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



    var id = $('#id_imagen').val();
    var type = $('#type').val();

	$("#fileuploader").uploadFile({
	    url:"{{url('/admin/imagenes/')}}/"+id+"/"+type,
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
            $('.ajax-file-upload-container').html('');
            
        }
	});

    $(document).on('click', '.delImagen', function(e){

        e.preventDefault();
        id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url:"{{url('/admin/imagenes/')}}/"+id+"/delete",
            success: function(data) {

                $("#listimagenes").html(data);
                $('.ajax-file-upload-container').html('');
               
            }
        })

    })
});

</script>

@endsection