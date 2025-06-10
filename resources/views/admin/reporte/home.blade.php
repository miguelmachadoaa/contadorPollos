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
                  action="{{route('admin.reporte.exportcontratos')}}"
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
                      <label for="">Estado de Contrato</label>
                      <select class="form-control" name="estatus" id="estatus">
                        <option value="">Todos</option>
                        <option    value="desactivado">Desactivado</option>
                        <option   value="activo">Activo</option>
                        <option   value="lista_compra">Lista de Compra</option>
                        <option   value="adjudicado">Adjudicado</option>
                        <option   value="retirado">Retirado</option>
                      </select>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-sm-3">
                      <label for="">Asesor</label>
                      <select class="form-control" name="asesor" id="asesor">
                        <option value="">Todos</option>
                        @foreach($asesores as $asesor)
                        <option value="{{$asesor->id}}">{{$asesor->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-sm-3">
                      <label for="">Producto</label>
                      <select class="form-control" name="producto" id="producto">
                        <option value="">Todos</option>
                        @foreach($productos as $producto)
                        <option value="{{$producto->id}}">{{$producto->titulo}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-sm-3">
                      <label for="">Categorias</label>
                      <select class="form-control" name="categoria" id="categoria">
                        <option value="">Todos</option>
                        @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->titulo}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-sm-3">
                      <label for="">Grupo</label>
                      <select class="form-control" name="grupo" id="grupo">
                        <option value="">Todos</option>
                        @foreach($grupos as $grupo)
                        <option value="{{$grupo->id}}">{{$grupo->nombre}} - Contratos: {{count($grupo->contratos)}}</option>
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