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

        <form
        action="{{route('admin.paquetes.update', ['id'=>$paquete->id])}}"
        method="post"
        id="formproducts"
        class=""
        enctype="multipart/form-data"
        >

        
        <div class="card card_border py-2 mb-4">
          <div class="cards__heading">
              <h3>Actualizar paquete <span></span></h3>
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
            
           

                @csrf

                <div class="form-group row">
                  <div class="previews"></div>
                </div>

                <input type="hidden" name="id" id="id" value="{{old('id', $paquete->id)}}">

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
                        value="{{$paquete->titulo}}"
                        placeholder="Titulo">
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Descripcion</label>
                    <div class="col-sm-10">
                        <textarea
                        class="form-control textarea"
                        id="descripcion"
                        name="descripcion"
                        rows="3">{{old('descripcion', $paquete->descripcion)}}
                        </textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Dias</label>
                    <div class="col-sm-10">
                        <input
                        required
                        type="number"
                        min="0"
                        step="1"
                        class="form-control input-style"
                        id="dias"
                        name="dias"
                        value="{{old('dias', $paquete->dias)}}"
                        placeholder="Dias">
                    </div>
                </div>



                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Incluye</label>
                    <div class="col-sm-10">
                        <textarea
                        class="form-control textarea"
                        id="include"
                        name="include"
                        rows="3">{{old('include', $paquete->include)}}
                        </textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">No Incluye</label>
                    <div class="col-sm-10">
                        <textarea
                        class="form-control textarea"
                        id="noinclude"
                        name="noinclude"
                        rows="3">{{old('destino', $paquete->noinclude)}}
                        </textarea>
                    </div>
                </div>

             

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Informacion</label>
                    <div class="col-sm-10">
                        <textarea
                        class="form-control textarea "
                        id="informacion"
                        name="informacion"
                        rows="3">{{old('informacion', $paquete->informacion)}}
                        </textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Idioma</label>
                    <div class="col-sm-10">
                        <select class="form-control requerido" id="idioma" name="idioma" required>
                            <option @if($paquete->idioma == 'es') Selected @endif value="es">Español</option>
                            <option @if($paquete->idioma == 'en') Selected @endif value="en">Ingles</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Pais</label>
                    <div class="col-sm-10">
                        <select class="form-control requerido" id="pais" name="pais" required>
                            <option value="">Seleccione</option>
                            @foreach($paises as $pais)
                                <option value="{{$pais->sortname}}" @if($paquete->pais == $pais->sortname) Selected  @endif>{{$pais->country_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                   <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Seleccione los destinos relacionados</label>
                        <div class="col-sm-10">
                            <div class="row">
                                @foreach($destinos as $destino)

                                    <div class="col-sm-4">
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="destino_{{$destino->id}}" name="destino_{{$destino->id}}"  value="{{$destino->id}}"  @if(in_array($destino->id, $paqueteDestinosArray )  ) checked  @endif  >
                                            <label class="form-check-label" for="inlineCheckbox1">{{$destino->titulo}}</label>
                                        </div>

                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Imagen Principal </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="myfile" name="myfile">
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <img width="120px" src="{{url('uploads/imagenes/'.$paquete->imagen)}}" alt="">
                    </div>
                </div>

                <div class="form-group row">
                      <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary btn-style">Actualizar & continuar </button>
                          <a href="{{url('admin/paquetes')}}" class="btn btn-info btn-style">Volver</a>
                      </div>
                  </div>
          </div>
      </div>    <!-- End Card -->




    <div class="card card_border py-2 mb-4">
        <div class="cards__heading">
            <h3>Galeria de Imagenes <span></span></h3>
        </div>
        <div class="card-body">

              <div class="form-group row mt-2">
                  <div class="col-sm-10">

                      <input type="hidden" name="id_imagen" id="id_imagen" value="{{$paquete->id}}">
                      <input type="hidden" name="type" id="type" value="paquete">
                      
                      <div class="form-group row">
                              <div id="fileuploader">Upload</div>
                      </div>
              
                      <div class="form-group row mt-2">

                          <div id="listimagenes">

                              @include('admin.imagenes.imagenes', ['imagenes'=>$imagenes])
                              
                          </div>
                      </div>

                  </div>
              </div>

             
        </div>
    </div>    <!-- End Card -->
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary btn-style">Actualizar & continuar</button>
            <a href="{{url('admin/paquetes')}}" class="btn btn-info btn-style">Salir</a>
        </div>
    </div>

    </form>


      </div>
    </div>
  </div>

  <input type="hidden" id="base" name="base" value="{{url('/')}}">

@endsection

@section('js')

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="{{url('/js/jquery.uploadfile.min.js')}}"></script>

<script src="{{url('/Trumbowyg/src/trumbowyg.js')}}"></script>
<script src="{{url('/Trumbowyg/src/plugins/base64/trumbowyg.base64.js')}}"></script>
<script>



$(document).ready(function()
{

    $('.textarea')
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
                //$("#listimagenes").html("<br/>Widget Loaded:");
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


    $(".saveItinerario").on('click', function() {

        var id = document.getElementById("id").value;
        var id_itinerario = document.getElementById("id_itinerario").value;
        var titulo = document.getElementById("itinerario_titulo").value;
        var descripcion = document.getElementById("itinerario_descripcion").value;
        var inputFile = document.getElementById("myfile_itinerario");
        var file = inputFile.files[0];


        if (file) {
            var formData = new FormData();
            formData.append("myfile", file);
            formData.append("descripcion", descripcion);
            formData.append("titulo", titulo);
            formData.append("id", id);
            formData.append("id_itinerario", id_itinerario);

            $.ajax({
                url:"{{url('/admin/paquetes/itinerario')}}", // Ruta del script PHP que procesará el archivo
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                   // console.log("Archivo subido correctamente:", response);
                    $('.listaItinerario').html(response)

                    $("#itinerario_titulo").val(null);
                    $("#itinerario_descripcion").html(null);
                    $(".previewItinerario").html(null);
                    $("#id_itinerario").val(null);
                },
                error: function(xhr, status, error) {
                    console.error("Error al subir el archivo:", error);
                }
            });
        } else {
            console.warn("No se seleccionó ningún archivo.");
        }
    });


    $(document).on('click','.delItinerario', function() {

    var itinerario = $(this).data('id');
    var id = document.getElementById("id").value;

    if (id) {
        var formData = new FormData();
        formData.append("id", id);
        formData.append("itinerario", itinerario);

        $.ajax({
            url:"{{url('/admin/paquetes/deleteitinerario')}}", // Ruta del script PHP que procesará el archivo
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('.listaItinerario').html(response)

            },
            error: function(xhr, status, error) {
                console.error("Error al subir el archivo:", error);
            }
        });
    } else {
        console.warn("No se seleccionó ningún archivo.");
    }
    });


    $(document).on('click','.editItinerario', function() {

        var json = $(this).data('json');
        var itinerario = $(this).data('id');
        var id = document.getElementById("id").value;
        var base = document.getElementById("base").value;

        $("#id_itinerario").val(json.id);
        $("#itinerario_titulo").val(json.titulo);
        $("#itinerario_descripcion").html(json.descripcion);
        $('.previewItinerario').html('<img src="'+base+'/uploads/imagenes/'+json.imagen+'" width="120px" >')

    });

});

</script>

@endsection