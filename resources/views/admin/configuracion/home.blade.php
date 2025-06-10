@extends('layouts.app')

@section('css')

@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        <div class="welcome-msg pt-3 pb-4">
          <h1>Listado de Configuraciones</h1>
        </div>

        <div class="data-tables">
          <div class="row">
            <div class="col-lg-12 mb-4">
              <div class="card card_border p-4">
                <div class="table-responsive">

                  <form
                    action="{{route('admin.configuracion.store')}}"
                    method="post"
                    id="formproducts"
                    class=""
                    enctype="multipart/form-data"
                    >

                        @csrf
                     
                        <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Negocio</label>
                                <div class="col-sm-10">
                                    <input
                                    required
                                    type="text"
                                    class="form-control input-style"
                                    id="negocio"
                                    name="negocio"
                                    value="{{$configuracion->negocio??null}}"
                                    placeholder="negocio">
                                </div>
                          </div>

                          <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Direccion</label>
                                  <div class="col-sm-10">
                                      <input
                                      required
                                      type="text"
                                      class="form-control input-style"
                                      id="direccion"
                                      name="direccion"
                                      value="{{$configuracion->direccion??null }}"
                                      placeholder="direccion">
                                  </div>
                            </div>

                          <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Telefono</label>
                                <div class="col-sm-10">
                                    <input
                                    required
                                    type="text"
                                    class="form-control input-style"
                                    id="telefono"
                                    name="telefono"
                                    value="{{$configuracion->telefono??null }}"
                                    placeholder="telefono">
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
                                  value="{{$configuracion->email??null }}"
                                  placeholder="email">
                              </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label input__label">whatsapp</label>
                            <div class="col-sm-10">
                                <input
                                required
                                type="text"
                                class="form-control input-style"
                                id="whatsapp"
                                name="whatsapp"
                                placeholder="whatsapp"
                                value="{{$configuracion->whatsapp??null }}"
                                >
                            </div>
                      </div>

                      <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Video Footer</label>
                            <div class="col-sm-10">
                                <input
                                required
                                type="text"
                                class="form-control input-style"
                                id="videofooter"
                                name="videofooter"
                                placeholder="video del footer"
                                value="{{$configuracion->videofooter??null }}"
                                >
                                 <p><small>Pegar contenido obtenido en el compartir de youtube, quitar las etiquetas de width y height del codigo para que no quede muy grande al agregarse,o si desea puede colocarle el valor que desee.</small></p>
                            </div>

                      </div>

                      <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label input__label">Mostrar Idiomas</label>
                          <div class="col-sm-10">
                              <select required
                              class="form-select form-control"
                              id="show_idioma" name="show_idioma"
                              aria-label="Default select example">
                                  <option selected>Seleccione</option>
                                  <option @if($configuracion->show_idioma=="1") Selected @endif value="1">Si</option>
                                  <option @if($configuracion->show_idioma=="0") Selected @endif value="0">No</option>
                              </select>
                          </div>
                      </div>

                        <div class="form-group row">
                              <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary btn-style">Actualizar</button>
                                  <a href="{{url('admin/home')}}" class="btn btn-info btn-style">Volver</a>
                              </div>
                          </div>
                      </form>


                 
              </div>
            </div>
          </div>
          
        </div>



      </div>
    </div>
  </div>

@endsection


@section('js')

<script>

  $(document).ready(function(){
    $('#example').DataTable();
  })
</script>

@endsection