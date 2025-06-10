@extends('layouts.app')

@section('css')

@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        <div class="welcome-msg pt-3 pb-4">
          @if(auth()->user()->rol!='4')
            <a class="btn btn-primary" href="{{route('admin.blogs.add')}}">Crear</a>
          @endif
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
                              <th>Imagen</th>
                              <th>Idioma</th>
                              <th>Fecha Creado</th>
                              <th>Fecha Actualizado</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($blogs as $p)

                          <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->titulo}}</td>
                            <td><img loading="lazy" width="60px" src="{{url('uploads/blogs/'.$p->imagen)}}" alt=""></td>
                            
                            <td>
                                  @if($p->idioma == 'es')
                                  {{'Español'}}
                                  @else
                                    {{'Ingles'}}
                                  @endif
                                </td>
                            <td>{{$p->created_at->format('m/d/Y')}}</td>
                            <td>{{$p->updated_at->format('m/d/Y')}}</td>
                            <td>
                              <a
                              href= "{{url('admin/documentacion/'.$p->id."/detail")}}"
                              class="btn btn-success">
                                <i class="fa fa-eye"></i>
                              </a>

                              @if(auth()->user()->rol!='4')
                              <a
                              href= "{{url('admin/blogs/'.$p->id."/edit")}}"
                              class="btn btn-primary">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <button
                              data-id="{{$p->id}}"
                              data-url="{{url('/admin/blogs/'.$p->id.'/delete')}}"
                              class="btn btn-danger btnDelete">
                                <i class="fa fa-trash"></i>
                              </button>
                              @endif
                            </td>
                        </tr>

                          @endforeach
                         
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Nombre</th>
                            <!-- th>Imagen</!-->
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