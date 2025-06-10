
<p>Cuota #</p>
<h4>{{$detalle->cuota}}</h4>

<p>Fecha Estimada de pago</p>
<h4>{{$detalle->fecha}}</h4>

<p>Monto</p>
<h4>{{number_format($detalle->saldo,0)}}$</h4>

<p>Saldo Cliente</p>
<h4>{{$contrato->cliente->saldo_cliente}}$</h4>

<p>
    @if($contrato->cliente->saldo_cliente>= $detalle->saldo)

        <div class=" row mb-4">
            <div class="col">
                <label for="inputEmail3" class="col-form-label input__label">Fecha de Pago</label>
                <input
                required
                type="date"
                class="form-control input-style"
                id="fecha_pago"
                name="fecha_pago"
                value="{{date('Y-m-d')}}"
                placeholder="fecha-pago">
            </div>
           
        </div>

        <button class="btn btn-primary procesarCuota" data-last="{{$last}}" data-id="{{$detalle->id}}" data-contrato="{{$contrato->id}}">Pagar </button>
    @else
       <div class="alert alert-danger">No posee saldo suficiente para procesar esta cuota.</div> 
    @endif
</p>


