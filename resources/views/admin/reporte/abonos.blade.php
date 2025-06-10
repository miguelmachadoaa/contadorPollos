@extends('layouts.app')

@section('css')

@endsection

@section('content')

  <div class="container-fluid revisar">
    <div class="row">
      <div class="col">

        <div class="data-tables">
          <div class="row">
            <div class="col-lg-12 mb-4">
              <div class="card card_border p-4">
                <div class="table-responsive">

                  <form
                  action="{{route('admin.reporte.exportabonos')}}"
                  method="post"
                  id="formproducts"
                  class=""
                  enctype="multipart/form-data"
                  >
                  
                  <div class="row">
                    <div class="col">
                      <label for="">Desde</label>
                      <input type="date" class="form-control" id="desde" name="desde">
                    </div>

                    <div class="col">
                      <label for="">Hasta</label>
                      <input type="date" class="form-control" id="hasta" name="hasta">
                    </div>
                    
                    <div class="col">
                      <label for="">Cliente</label>
                      <select class="form-control select2"  name="cliente" id="cliente">
                        <option value="">Todos</option>
                        @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nombre.' '.$cliente->apellido}}</option>
                        @endforeach
                      </select>
                    </div>

                  </div>

                  <div class="row mt-4">
                    <div class="col-sm-4">
                      <select class="form-control" name="tipo" id="tipo">
                        <option    value="csv">Csv</option>
                        <option   value="pdf">Pdf</option>
                      </select>
                    </div>
                    
                    <div class="col">
                      <button class="btn btn-primary">Exportar</button>
                    </div>
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