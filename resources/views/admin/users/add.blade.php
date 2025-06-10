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
              <h3>Usuario<span></span></h3>
          </div>
          <div class="card-body">
            
            <form
            action="{{route('admin.users.store')}}"
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
                      <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Nombre</label>
                      <div class="col-sm-10">
                          <input
                          required
                          type="text"
                          class="form-control input-style"
                          id="name"
                          name="name"
                          placeholder="nombre">
                      </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Email</label>
                    <div class="col-sm-10">
                        <input
                        required
                        type="text"
                        class="form-control input-style"
                        id="email"
                        name="email"
                        placeholder="Email">
                    </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label input__label"> Password</label>
                <div class="col-sm-10">
                    <input
                    required
                    type="password"
                    class="form-control input-style"
                    id="repassword"
                    name="repassword"
                    placeholder="Password">
                </div>
            </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Re Password</label>
                    <div class="col-sm-10">
                        <input
                        required
                        type="password"
                        class="form-control input-style"
                        id="repassword"
                        name="repassword"
                        placeholder="Password">
                    </div>
                </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Rol</label>
                <div class="col-sm-10">
                    <select class="form-control " id="rol" name="rol">
                        <option   value="1">Administrador</option>
                        <option   value="2">Encargado</option>
                        <option   value="3">Agente</option>
                        <option   value="4">Cliente</option>
                    </select>
                </div>
            </div>

              
                <div class="form-group row">
                      <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary btn-style">Crear</button>
                          <a href="{{url('admin/users')}}" class="btn btn-info btn-style">Volver</a>
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