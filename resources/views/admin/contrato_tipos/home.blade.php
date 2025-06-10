@extends('layouts.app')

@section('css')

@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        <div class="welcome-msg pt-3 pb-4">
          <h1>Listado de Tipos de Contratos</h1>
          <a class="btn btn-primary" href="{{route('admin.contratos_tipos.add')}}">Crear</a>
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
                              <th>Cuotas</th>
                              <th>Porcentaje</th>
                              <th>Estado</th>
                              <th>Fecha Creado</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($contratosTipos as $ct)

                          <tr>
                            <td>{{$ct->id}}</td>
                            <td>{{$ct->nombre}}</td>
                            <td>{{$ct->cuotas}}</td>
                            <td>{{$ct->porcentaje}}</td>
                            <td>
                              @if($ct->estatus)
                              <span class="badge badge-success">Active</span>
                              @else
                              <span class="badge badge-warning">In active</span>
                              @endif
                            </td>
                            <td>{{$ct->created_at}}</td>
                            <td>
                              <a
                              href= "{{url('admin/contratos_tipos/'.$ct->id."/edit")}}"
                              class="btn btn-primary">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <button
                              data-id="{{$ct->id}}"
                              data-url="{{url('/admin/contratos_tipos/'.$ct->id.'/delete')}}"
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
                            <th>Cuotas</th>
                            <th>Porcentaje</th>
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