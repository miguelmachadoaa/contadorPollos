<x-mail::message>

<h1>Nuevo Contrato</h1>

<p>Hemos agregado un contrato a nombre de {{$contrato->cliente->nombre }} {{$contrato->cliente->apellido }}</p>

<p>Monto del Contrato: {{$contrato->monto}}$</p>

<p>Producto: {{$contrato->producto->titulo}}</p>

<p>Marca: {{$contrato->producto->marca}}</p>

<p>Cada Cuota con el Valor de: {{$contrato->detalle()->first()->monto}}$</p>

<p>Estado del Contrato : {{$contrato->estatus}}</p>


Gracias ,<br>
Migtours de Venezuela
</x-mail::message>
