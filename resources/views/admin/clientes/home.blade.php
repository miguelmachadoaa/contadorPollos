@extends('layouts.app')

@section('css')

@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        

        <div class="welcome-msg pt-3 pb-4">
          <h1>Listado de Clientes</h1>
          <a class="btn btn-primary" href="{{route('admin.clientes.add')}}">Crear</a>
        </div>
        
        <div class="data-tables">
          <div class="row">
            <div class="col-lg-12 mb-4">
              <div class="card card_border p-4">
                <div class="table-responsive">
                  <div id="example_wrapper" class="dataTables_wrapper no-footer">
                   @include('admin.clientes.table')
                 
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