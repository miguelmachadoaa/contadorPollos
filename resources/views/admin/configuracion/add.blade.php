@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<link rel="stylesheet" href="{{url('css/uploadfile.css')}}">
<link href="{{url('/summernote/summernote-bs4.min.css')}}" rel="stylesheet">
@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        
        <div class="card card_border py-2 mb-4">
          <div class="cards__heading">
              <h3>Crear Categoria <span></span></h3>
          </div>
          <div class="card-body">
            
            <form
            action="{{route('admin.sliders.store')}}"
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Enlace</label>
                    <div class="col-sm-10">
                        <input
                        required
                        type="text"
                        class="form-control input-style"
                        id="enlace"
                        name="enlace"
                        placeholder="enlace">
                    </div>
              </div>


                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Descripcion</label>
                    <div class="col-sm-10">
                        <textarea required class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                        
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
                <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Imagen de la categoria</label>
                <div class="col-sm-10">
                    <input class="form-control" id="myfile" name="myfile" type="file" >
                    
                </div>
            </div>

                <div class="form-group row">
                      <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary btn-style">Crear</button>
                          <a href="{{url('admin/products')}}" class="btn btn-info btn-style">Volver</a>
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

<script src="{{url('/summernote/summernote-bs4.min.js')}}"></script>


<script>



$(document).ready(function()
{

    $('.summernote').summernote('code');



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