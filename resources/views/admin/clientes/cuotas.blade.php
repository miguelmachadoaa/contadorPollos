<div class="col-sm-12">
    <p>Cuotas</p>
    <div class="row">

        @php 
            $id_ultima=null;
            $ultimaCuotaEnEspera = $contrato->detalles()->where('estatus', 0)->orderBy('id', 'desc')->first();
            if(isset($ultimaCuotaEnEspera->id )){
                $id_ultima=$ultimaCuotaEnEspera->id;
            }
        @endphp
        
        @foreach($contrato->detalles as $detalle)

            @if(trim($detalle->color)=='ligth')

                
                

                <button
                    class="btn btn-ligth 
                    @if(Auth::user()->rol==1 || Auth::user()->rol==2 )
                    {{($id_ultima == $detalle->id ) ? 'pagarCuotaLast' : 'pagarCuota'}}
                    @endif
                    mb-2 mr-1 mb-1  {{($detalle->saldo==$detalle->monto)?' ':'bg-adelanto'}}"
                    style="border: 1px solid rgba(0,0,0,0.5)  "
                    data-id="{{$detalle->id}}"
                    data-contrato="{{$contrato->id}}"
                    title="Pendiente - 
                    {{number_format($detalle->saldo,0)}}
                    $ - Fecha Pago: {{$detalle->fecha}}">#{{$detalle->cuota}} 
                </button>

            @elseif($detalle->color=='red')

                <button
                    class="btn btn-danger 
                    @if(Auth::user()->rol==1 || Auth::user()->rol==2 )
                    {{($id_ultima == $detalle->id) ? 'pagarCuotaLast' : 'pagarCuota'}} 
                    @endif
                    mb-2 mr-1 mb-1"
                    data-id="{{$detalle->id}}"
                    data-contrato="{{$contrato->id}}"
                    title="Vencida - 
                    {{number_format($detalle->saldo,0)}}
                    $ - Fecha Pago: {{$detalle->fecha}}">#{{$detalle->cuota}} 
                </button>

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
                    class="btn btn-ligth 
                    @if(Auth::user()->rol==1 || Auth::user()->rol==2 )
                    {{($id_ultima == $detalle->id) ? 'pagarCuotaLast' : 'pagarCuota'}} 
                    @endif
                    mb-2 mr-1 mb-1  {{($detalle->saldo==$detalle->monto)?' ':'bg-adelanto'}} " 
                    style="border: 1px solid rgba(0,0,0,0.5)  "
                    data-id="{{$detalle->id}}"
                    data-contrato="{{$contrato->id}}"
                    title="Pendiente - 
                    {{number_format($detalle->saldo,0)}}
                    $ - Fecha Pago: {{$detalle->fecha}}">#{{$detalle->cuota}} - {{number_format($detalle->saldo,0)}}$ - Fecha Pago: {{ DateTime::createFromFormat('Y-m-d', $detalle->fecha)->format('d/m/Y') }}
                </button>



            @elseif($detalle->color=='red')
                <button
                    class="btn btn-danger 
                    @if(Auth::user()->rol==1 || Auth::user()->rol==2 )
                    {{($id_ultima == $detalle->id) ? 'pagarCuotaLast' : 'pagarCuota'}} 
                    @endif
                    mb-2 mr-1 mb-1"
                    data-id="{{$detalle->id}}"
                    data-contrato="{{$contrato->id}}"
                    title="Vencida - 
                    {{number_format($detalle->saldo,0)}}
                    $ - Fecha Pago: {{$detalle->fecha}}">#{{$detalle->cuota}} - {{number_format($detalle->saldo,0)}}$ - Fecha Pago: {{DateTime::createFromFormat('Y-m-d', $detalle->fecha)->format('d/m/Y')}}
                </button>
            @elseif($detalle->color=='orange')
                <button class="btn btn-secondary mb-2 mr-1 mb-1" title="Pagada">#{{$detalle->cuota}} - {{number_format($detalle->saldo,0)}}$ - Fecha Pago: {{DateTime::createFromFormat('Y-m-d', $detalle->fecha)->format('d/m/Y')}}</button>
            @elseif($detalle->color=='warning')
                <button class="btn btn-warning mb-2 mr-1 mb-1" title="Pagada">#{{$detalle->cuota}} - {{number_format($detalle->saldo,0)}}$ - Fecha Pago: {{DateTime::createFromFormat('Y-m-d', $detalle->fecha)->format('d/m/Y')}}</button>
            @else
                <button class="btn btn-success mb-2 mr-1 mb-1" title="Pagada">#{{$detalle->cuota}} - {{number_format($detalle->saldo,0)}}$ - Fecha Pago: {{DateTime::createFromFormat('Y-m-d', $detalle->fecha)->format('d/m/Y')}}</button>
            @endif
        
    @endforeach
    </div>


    
</div>