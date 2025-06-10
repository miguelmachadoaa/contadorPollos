@extends('layouts.app')

@section('css')

@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        <div class="welcome-msg pt-3 pb-4">
          <h1>Listado de Usuarios</h1>
          <a class="btn btn-primary" href="{{route('admin.users.add')}}">Crear</a>
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
                              <th>Email</th>
                              <th>Rol</th>
                              <th>Estado</th>
                              <th>Fecha Creado</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($users as $user)

                          <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                              @if($user->rol=='1')
                              <span class="badge badge-success">Administrador</span>
                              @elseif($user->rol=='2')
                              <span class="badge badge-warning">Encargado</span>
                              @elseif($user->rol=='3')
                              <span class="badge badge-info">Agente</span>
                              @else
                              <span class="badge badge-danger">Cliente</span>
                              @endif
                            </td>
                            <td>
                              @if($user->estatus)
                              <span class="badge badge-success">Activo</span>
                              @else
                              <span class="badge badge-warning">Inactivo</span>
                              @endif
                            </td>
                            <td>{{$user->created_at}}</td>
                            <td>
                              <a
                              href= "{{url('admin/users/'.$user->id."/edit")}}"
                              class="btn btn-primary">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <button
                              data-id="{{$user->id}}"
                              data-url="{{url('/admin/users/'.$user->id.'/delete')}}"
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
                            <th>Email</th>
                            <th>Rol</th>
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