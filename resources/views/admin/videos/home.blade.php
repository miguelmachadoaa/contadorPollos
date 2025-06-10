@extends('layouts.app')

@section('css')

@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        <div class="welcome-msg pt-3 pb-4">
          <h1>Hi <span class="text-primary">John</span>, Welcome back</h1>
          <p>Very detailed &amp; featured admin.</p>
          <a class="btn btn-primary" href="{{route('admin.videos.add')}}">Crear</a>
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
                              <th>Nombre</th>
                              <th>Imagen</th>
                              <th>Estado</th>
                              <th>Fecha Creado</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($videos as $p)

                          <tr>
                            <td>{{$p->titulo}}</td>
                            <td><img width="60px" src="{{url('uploads/videos/'.$p->imagen)}}" alt=""></td>
                            <td>
                              @if($p->status)
                              <span class="badge badge-success">Active</span>
                              @else
                              <span class="badge badge-warning">In active</span>
                              @endif
                            </td>
                            <td>{{$p->created_at}}</td>
                            <td>
                              <a
                              href= "{{url('admin/videos/'.$p->id."/edit")}}"
                              class="btn btn-primary">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <button
                              data-id="{{$p->id}}"
                              data-url="{{url('/admin/videos/'.$p->id.'/delete')}}"
                              class="btn btn-danger btnDelete">
                                <i class="fa fa-trash"></i>
                              </button>
                            </td>
                        </tr>

                          @endforeach
                         
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
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