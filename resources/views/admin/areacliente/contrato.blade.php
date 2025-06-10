<div class="row p-2 m-0 mb-4" style="border-bottom: 1px solid rgba(0,0,0,0.1)">
    <div class="col-sm-4">
        <p>Monto del Contrato</p>
        <h4>{{$contrato->monto}}</h4>
    </div>
    <div class="col-sm-4">
        <p>Producto</p>
        <h4>{{$contrato->producto->titulo.' / '.$contrato->descripcion}}</h4>
    </div>

    <div class="col-sm-4">
        <p>Estado del Contrato</p>
        <h4>{{$contrato->estatus}}</h4>
       
    </div>

    <div class="cuotasList">
        @include('admin.areacliente.cuotas')
    </div>

    <hr>
    
</div>