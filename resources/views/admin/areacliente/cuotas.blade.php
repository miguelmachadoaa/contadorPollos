<div class="col-sm-12">
    <p>Cuotas</p>
    <div class="row">

        @php $ultimaCuotaEnEspera = $contrato->detalles()->where('estatus', 0)->orderBy('id', 'desc')->first();@endphp
        
        @foreach($contrato->detalles as $detalle)


            @if(trim($detalle->color)=='ligth')
                <button
                class="btn btn-ligth  mb-2 mr-1 mb-1  {{($detalle->saldo==$detalle->monto)?' ':'bg-adelanto'}} " style="border: 1px solid rgba(0,0,0,0.5)"
                data-id="{{$detalle->id}}"
                data-contrato="{{$contrato->id}}"
                title="Pendiente - {{number_format($detalle->monto,2)}}$ - Fecha Pago: {{$detalle->fecha}}">#{{$detalle->cuota}} </button>
            @elseif($detalle->color=='red')
                <button
                class="btn btn-danger  mb-2 mr-1 mb-1"
                data-id="{{$detalle->id}}"
                data-contrato="{{$contrato->id}}"
                title="Vencida - {{number_format($detalle->monto,2)}}$ - Fecha Pago: {{$detalle->fecha}}">#{{$detalle->cuota}} </button>
            @elseif($detalle->color=='orange')
                <button class="btn btn-secondary mb-2 mr-1 mb-1" title="Pagada">#{{$detalle->cuota}} </button>
            @elseif($detalle->color=='warning')
                <button class="btn btn-warning mb-2 mr-1 mb-1" title="Pagada">#{{$detalle->cuota}} </button>
            @else
                <button class="btn btn-success mb-2 mr-1 mb-1" title="Pagada">#{{$detalle->cuota}} </button>
            @endif
        
    @endforeach
    </div>
    <br>
    <div class="row">
        @foreach($contrato->detalles as $detalle)

            @if(trim($detalle->color)=='ligth')
                <button
                class="btn btn-ligth  mb-2 mr-1 mb-1  {{($detalle->saldo==$detalle->monto)?' ':'bg-adelanto'}} " style="border: 1px solid rgba(0,0,0,0.5)"
                data-id="{{$detalle->id}}"
                data-contrato="{{$contrato->id}}"
                title="Pendiente - {{number_format($detalle->monto,2)}}$ - Fecha Pago: {{$detalle->fecha}}">#{{$detalle->cuota}} - {{number_format($detalle->monto,2)}}$ - Fecha Pago: {{$detalle->fecha}}</button>
            @elseif($detalle->color=='red')
                <button
                class="btn btn-danger  mb-2 mr-1 mb-1"
                data-id="{{$detalle->id}}"
                data-contrato="{{$contrato->id}}"
                title="Vencida - {{number_format($detalle->monto,2)}}$ - Fecha Pago: {{$detalle->fecha}}">#{{$detalle->cuota}} - {{number_format($detalle->monto,2)}}$ - Fecha Pago: {{$detalle->fecha}}</button>
            @elseif($detalle->color=='orange')
                <button class="btn btn-secondary mb-2 mr-1 mb-1" title="Pagada">#{{$detalle->cuota}} - {{number_format($detalle->monto,2)}}$ - Fecha Pago: {{$detalle->fecha}}</button>
            @elseif($detalle->color=='warning')
                <button class="btn btn-warning mb-2 mr-1 mb-1" title="Pagada">#{{$detalle->cuota}} - {{number_format($detalle->monto,2)}}$ - Fecha Pago: {{$detalle->fecha}}</button>
            @else
                <button class="btn btn-success mb-2 mr-1 mb-1" title="Pagada">#{{$detalle->cuota}} - {{number_format($detalle->monto,2)}}$ - Fecha Pago: {{$detalle->fecha}}</button>
            @endif


        
    @endforeach
    </div>


    
</div>