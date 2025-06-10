<div class="row p-2 m-0 mb-4" style="border-bottom: 1px solid rgba(0,0,0,0.1)">
    
    <div class="col-sm-4">
        <p>Inscripción</p>
        <h4>{{$contrato->inscripcion}}
            @if(Auth::user()->rol==1)
            <a class="btn btn-link btnEditContrato" target="_blank" href="{{url('admin/contratos/'.$contrato->id."/edit")}}"><i class="fa fa-edit"></i></a> 
            @endif
            
        </h4>
    </div>
    <div class="col-sm-4">
        <p>Monto del Contrato</p>
        <h4>{{number_format($contrato->monto,2)}}</h4>
    </div>
    <div class="col-sm-4">
        <p>Diferencia del Contrato</p>
        @if($contrato->diferencia>0)
            <h4>{{number_format($contrato->diferencia,2)}}</h4>
            <small><b>Abonodo :</b>{{$cliente->pagos()->where('type', 'diferencia')->where('type_id', $contrato->id)->sum('monto')}}</small><br>
            <button 
                data-id="{{$cliente->id}}" 
                data-contrato = "{{$contrato->id}}"
                class="btn btn-primary mt-2 addPago">Crear Pago</button>
        @else
            <button
            data-id="{{$cliente->id}}" 
            data-contrato="{{$contrato->id}}" 
            class="btn btn-xs btn-primary btnAddDiferencia">+</button>
        @endif
        
        
    </div>

    <div class="col-sm-6">
        <p>Producto</p>
        <h6>{{$contrato->producto->titulo}}</h6>
    </div>

    <div class="col-sm-6">
        <p>Estado del Contrato</p>
        <select class="form-control " id="estado_contrato" name="estado_contrato" data-id="{{$contrato->id}}">
            <option @if($contrato->estatus == 'desactivado') Selected @endif   value="desactivado">Desactivado</option>
            <option @if($contrato->estatus == 'activo') Selected @endif  value="activo">Activo</option>
            <option @if($contrato->estatus == 'lista_compra') Selected @endif  value="lista_compra">Lista de Compra</option>
            <option @if($contrato->estatus == 'adjudicado') Selected @endif  value="adjudicado">Adjudicado</option>
            <option @if($contrato->estatus == 'retirado') Selected @endif  value="retirado">Retirado</option>
        </select>
    </div>

    <div class="col-sm-12">
        <p>Asesor</p>
        <h4>{{$contrato->vendedor->name}}</h4>
    </div>

    <div class="cuotasList">
        @include('admin.clientes.cuotas')
    </div>


    

    <hr>
    
</div>