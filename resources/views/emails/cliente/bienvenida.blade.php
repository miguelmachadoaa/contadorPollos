<x-mail::message>

<h1>Hola, {{$contrato->cliente->nombre }} {{$contrato->cliente->apellido }} </h1>

<h1>Has Activado  el  Contrato #{{$contrato->inscripcion}}</h1>

<p>Monto del Contrato: {{$contrato->monto}}$</p>

<p>Producto: {{$contrato->producto->titulo}}</p>

<p>Marca: {{$contrato->producto->marca}}</p>

<p>Cada Cuota con el Valor de: {{$contrato->detalle()->first()->monto}}$</p>

<p>Estado del Contrato : {{$contrato->estatus}}</p>

Gracias ,<br>
Migtours de Venezuela
</x-mail::message>
