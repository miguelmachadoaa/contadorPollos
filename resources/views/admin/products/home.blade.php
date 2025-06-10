@extends('layouts.app')

@section('css')

@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        <div class="welcome-msg pt-3 pb-4">
          <h1>Listado de Productos</h1>
          <a class="btn btn-primary" href="{{route('admin.products.add')}}">Crear</a>
        </div>
        <div class="data-tables">
          <div class="row">
            <div class="col-lg-12 mb-4">
              <div class="card card_border p-4">
                <div class="table-responsive">
                  <div id="example_wrapper" class="dataTables_wrapper no-footer">
                    <table id="example" class="table table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Nombre</th>
                              <th>Precio</th>
                              <th>Estado</th>
                              <th>Fecha Creado</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($productos as $p)

                          <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->titulo}}</td>
                            <td>{{$p->precio}}</td>
                            <td>
                              @if($p->estatus)
                              <span class="badge badge-success">Activo</span>
                              @else
                              <span class="badge badge-warning">Inactivo</span>
                              @endif
                            </td>
                            <td>{{$p->created_at}}</td>
                            <td>
                              <a
                              href= "{{url('admin/products/'.$p->id."/edit")}}"
                              class="btn btn-primary">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <button
                              data-id="{{$p->id}}"
                              data-url="{{url('/admin/products/'.$p->id.'/delete')}}"
                              class="btn btn-danger btnDelete">
                                <i class="fa fa-trash"></i>
                              </button>
                            </td>
                        </tr>

                          @endforeach
                         
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Id</th>
                              <th>Nombre</th>
                              <th>Precio</th>
                              <th>Estado</th>
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