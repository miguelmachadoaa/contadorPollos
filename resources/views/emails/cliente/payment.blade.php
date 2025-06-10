<x-mail::message>

<p>Recibo</p>

<p>Hemos procesado un pago a nombre de {{$pago->cliente->nombre }}</p>

<p>Segun el organigrama de Pago, la cuota Nro.: {{$pago->detalle->cuota}}</p>

<p>Cada Cuota con el Valor de: {{$pago->monto}}$</p>

<p>Total: {{$pago->monto}}</p>


Gracias ,<br>
Migtours de Venezuela   
</x-mail::message>
