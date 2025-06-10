@extends('layouts.app')

@section('css')

@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        

        <div class="welcome-msg pt-3 pb-4">
          <h1>Listado de Contactos</h1>
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
                              <th>Apellido</th>
                              <th>Email</th>
                              <th>Telefono</th>
                              <th>Ciudad</th>
                              <th>Pais</th>
                              <th>Mensaje</th>
                              <th>Fecha Creado</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($contactos as $contacto)

                          <tr>
                            <td>{{$contacto->id}}</td>
                            <td>{{$contacto->nombre}}</td>
                            <td>{{$contacto->apellido}}</td>
                            <td>{{$contacto->email}}</td>
                            <td>{{$contacto->telefono}}</td>
                            <td>{{$contacto->ciudad}}</td>
                            <td>{{$contacto->pais}}</td>
                            <td>{{$contacto->mensaje}}</td>
                           
                            <td>{{$contacto->created_at}}</td>
                           
                        </tr>

                          @endforeach
                         
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Id</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Email</th>
                              <th>Telefono</th>
                              <th>Ciudad</th>
                              <th>Pais</th>
                              <th>Mensaje</th>
                              <th>Fecha Creado</th>
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