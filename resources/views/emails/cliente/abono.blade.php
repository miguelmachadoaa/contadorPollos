<x-mail::message>

<p>Recibo</p>

<p>Hemos procesado un abono a nombre de {{$abono->cliente->nombre }} {{$abono->cliente->apellido }}</p>

<h3>Detalles del Abono</h3>

<p>Fecha: {{$abono->fecha}}</p>

<p>Monto: {{$abono->monto}}$</p>

<p>Forma de Pago : {{$abono->formapago->nombre}}</p>

<p>Referencia : {{$abono->referencia}}</p>

<p>Estado:   @if($abono->estatus =='0')
        <b>En espera de Revision </b>
    @elseif($abono->estatus == '1')
        <b>Aprobado </b>
    @else
        <b>Rechazado</b>
    @endif
</p>

<p>Observaciones: {{$abono->observaciones}}</p>

Gracias ,<br>

Migtours de Venezuela
</x-mail::message>
