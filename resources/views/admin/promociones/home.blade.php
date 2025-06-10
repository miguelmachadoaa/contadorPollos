@extends('layouts.app')

@section('css')

@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        <div class="welcome-msg pt-3 pb-4">
          <h1>Listado de promociones</h1>
          <a class="btn btn-primary" href="{{route('admin.promociones.add')}}">Crear</a>
        </div>

        <div class="data-tables">
          <div class="row">
            <div class="col-lg-12 mb-4">
              <div class="card card_border p-4">
                <div class="table-responsive">
                  <div id="example_wrapper" class="dataTables_wrapper no-footer">
                    <table descriptio="" id="example" class="table table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Titulo</th>
                              <th>Idioma</th>
                              <th>Imagen</th>
                              <th>Fecha Creado</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($paquetes as $paquete)

                            <tr>
                                <td>{{$paquete->id}}</td>
                                <td>{{$paquete->titulo}}</td>
                                <td>
                                  @if($paquete->idioma == 'es')
                                  {{'Español'}}
                                  @else
                                    {{'Ingles'}}
                                  @endif
                                </td>
                                <td>
                                  <img src="{{url('uploads/imagenes/'.$paquete->imagen)}}" alt="" width="60px">
                                </td>
                              
                                 <td>{{$paquete->created_at->format('d/m/Y')}}</td>
                                <td>
                                  <a
                                  href= "{{url('admin/promociones/'.$paquete->id."/edit")}}"
                                  class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>
                                  </a>

                                  <button data-id="{{$paquete->id}}" data-url="{{url('admin/promociones/'.$paquete->id.'/delete')}}" class="btn btn-danger btnDelete"> <i class="fa fa-trash"></i></button>

                                  <button data-id="{{$paquete->id}}" data-url="{{url('admin/promociones/'.$paquete->id.'/duplicar')}}" class="btn btn-success btnDuplicar"> <i class="fa fa-clone"></i></button>
                                  
                                </td>
                            </tr>

                          @endforeach
                         
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Pais</th>
                            <th>Imagen</th>
                            <th>Fecha Creado</th>
                            <th>Acciones</th>
                          </tr>
                      </tfoot>
                  </table>
                 
                </div>
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