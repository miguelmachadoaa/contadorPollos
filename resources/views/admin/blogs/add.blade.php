@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<link rel="stylesheet" href="{{url('css/uploadfile.css')}}">
<link href="{{url('/Trumbowyg/src/ui/trumbowyg.css')}}" rel="stylesheet">
<link href="{{url('/js/tagify/dist/tagify.css')}}" rel="stylesheet">
@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        
        <div class="card card_border py-2 mb-4">
          <div class="cards__heading">
              <h3>Crear Blog <span></span></h3>
          </div>
          <div class="card-body">
            
            <form
            action="{{route('admin.blogs.store')}}"
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
                          class="form-control input-style"
                          id="titulo"
                          name="titulo"
                          placeholder="Titulo">
                      </div>
                </div>


                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Contenido</label>
                    <div class="col-sm-10">
                        <textarea required class="form-control" id="contenido" name="contenido" rows="3"></textarea>
                        
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Disponible</label>
                    <div class="col-sm-10">
                        <select
                        required
                        class="form-select form-control"
                        id="estatus"
                        name="estatus"
                        aria-label="Default select example">
                            <option selected>Seleccione</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Imagen </label>
                <div class="col-sm-10">
                    <input class="form-control" id="myfile" name="myfile" type="file" >
                    
                </div>
            </div>


            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Etiquetas</label>
                <div class="col-sm-10">
                    <input
                    required
                    type="text"
                    class="form-control input-style"
                    id="tags"
                    name="tags"
                    placeholder="tags">
                </div>
          </div>



                <div class="form-group row">
                      <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary btn-style">Crear</button>
                          <a href="{{url('admin/blogs')}}" class="btn btn-info btn-style">Volver</a>
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
<script src="{{url('/js/tagify/dist/tagify.js')}}"></script>
<script>



$(document).ready(function()
{

        // The DOM element you wish to replace with Tagify
    var input = document.querySelector('input[name=tags]');

    // initialize Tagify on the above input node reference
    new Tagify(input)

    $('#contenido')
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

</script>

@endsection