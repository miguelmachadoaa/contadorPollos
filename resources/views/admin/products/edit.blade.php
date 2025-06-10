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
              <h3>Editar Producto <span></span></h3>
          </div>
          <div class="card-body">


                 
            <form action="{{route('admin.products.update')}}" method="post" id="formproducts" class="">

                @csrf

                <input type="hidden" id="id" name="id" value="{{$producto->id}}">
                <input type="hidden" id="id_product" name="id_product" value="{{$producto->id}}">
                
                <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Titulo</label>
                      <div class="col-sm-10">
                          <input
                          required
                          type="text"
                          class="form-control input-style"
                          id="titulo"
                          name="titulo"
                          value="{{$producto->titulo}}"
                          placeholder="Titulo">
                      </div>
                </div>


                <!--div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Precio</label>
                    <div class="col-sm-10">
                        <input required type="number" step="0.01" min="0" class="form-control input-style" id="precio" name="precio" value="{{$producto->precio}}" placeholder="Precio">
                    </div>
                </!--div>

                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Descripcion</label>
                    <div class="col-sm-10">
                        <textarea
                        required
                        class="form-control"
                        id="descripcion"
                        name="descripcion"
                        rows="3">{{$producto->descripcion}}</textarea>
                        
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Caracteristicas</label>
                    <div class="col-sm-10">
                        <textarea
                        required
                        class="form-control"
                        id="caracteristicas"
                        name="caracteristicas"
                        rows="3">{{$producto->descripcion}}</textarea>
                        
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Condiciones</label>
                    <div class="col-sm-10">
                        <textarea
                        required
                        class="form-control"
                        id="condiciones"
                        name="condiciones"
                        rows="3">{{$producto->descripcion}}</textarea>
                        
                    </div>
                </div>

                <div-- class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Sku</label>
                    <div class="col-sm-10">
                        <input
                        required
                        type="text"
                        class="form-control input-style" 
                        id="sku"
                        name="sku"
                        value="{{$producto->sku}}" 
                        placeholder="Sku">
                    </div>
                </div-->


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Marca</label>
                    <div class="col-sm-10">
                        <input
                        required
                        type="text"
                        class="form-control input-style" 
                        id="marca"
                        name="marca"
                        value="{{$producto->marca}}" 
                        placeholder="Marca">
                    </div>
                </div>



                



                <div class="form-group row mb-4">

                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Categorias </label>

                    <div class="col-sm-10 p-0 m-0">

                        @foreach ($categorias  as $c)

                        <div class=" form-check">
                            <input
                            class="form-check-input"
                            type="checkbox"
                            @if(in_array($c->id, $categorias_poroducto ))
                            checked
                            @endif
                            value="{{$c->id}}"
                            id="categoria_{{$c->id}}"
                            name="categoria_{{$c->id}}"
                            >
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$c->titulo}}
                            </label>
                        </div>

                    @endforeach

                    </div>

                    
                </div>





                <!--div class="form-group row">
                    <div class="col-sm-2">Cargar Imagenes</div>
                    <div class="col-sm-10">
                        
                        <div id="fileuploader">Upload</div>
                    </div>
                </!--div>
                <div-- class="form-group row">
                    <div class="col-sm-2">Imagenes Cargadas</div>
                    <div class="col-sm-10">
                        <div id="listimagenes">
                            @include('admin.products.imagenes')
                            
                        </div>
                    </div>
                </div-->


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Disponible</label>
                    <div class="col-sm-10">
                        <select required
                        class="form-select form-control"
                        id="estatus" name="estatus"
                        aria-label="Default select example">
                            <option selected>Seleccione</option>
                            <option @if($producto->estatus=="1") Selected @endif value="1">Si</option>
                            <option @if($producto->estatus=="0") Selected @endif value="0">No</option>
                        </select>
                    </div>
                </div>

                

                  <div class="form-group row">
                      <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary btn-style">Actualizar</button>
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