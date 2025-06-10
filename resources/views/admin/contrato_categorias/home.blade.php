@extends('layouts.app')

@section('css')

@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">


        <div class="welcome-msg pt-3 pb-4">
          <h1>Listado de Categorias de Contrato</h1>
          <a class="btn btn-primary" href="{{route('admin.contratos_categorias.add')}}">Crear</a>
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
                              <th>Nombre</th>
                              <th>Monto</th>
                              <th>Estado</th>
                              <th>Fecha Creado</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($contratosCategorias as $cc)

                          <tr>
                            <td>{{$cc->id}}</td>
                            <td>{{$cc->nombre}}</td>
                            <td>{{$cc->monto}}</td>
                            <td>
                              @if($cc->estatus)
                              <span class="badge badge-success">Active</span>
                              @else
                              <span class="badge badge-warning">In active</span>
                              @endif
                            </td>
                            <td>{{$cc->created_at}}</td>
                            <td>
                              <a
                              href= "{{url('admin/contratos_categorias/'.$cc->id."/edit")}}"
                              class="btn btn-primary">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <button
                              data-id="{{$cc->id}}"
                              data-url="{{url('/admin/contratos_categorias/'.$cc->id.'/delete')}}"
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
                            <th>Monto</th>
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