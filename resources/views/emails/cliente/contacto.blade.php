<x-mail::message>


<p>Hola {{$contacto->nombre }} {{$contacto->apellido}} </p>

<p>¡Gracias por ponerte en contacto con nosotros! Hemos recibido tu mensaje y nuestro equipo lo está revisando. Nos pondremos en contacto contigo lo antes posible.</p>

<p> Detalles dde tu mensaje</p>
<p>Nombre: {{$contacto->nombre }} {{$contacto->apellido}}  </p>
<p>Telefono: {{$contacto->telefono }}</p>
<p>Correo Electrónico: {{$contacto->email }}  </p>
<p>Pais y Ciudad:  {{$contacto->pais }} {{$contacto->ciudad}}  </p>
<p>Mensaje:  {{$contacto->mensaje }} </p>

<p> Si necesitas asistencia inmediata, no dudes en llamarnos al {{$configuracion->telefono}} o responder a este correo electrónico</p>

<p>Gracias por tu paciencia y por elegirnos.</p>

<p>Saludos cordiales,</p>


Gracias ,<br>
Migtours
{{$configuracion->email}}
{{$configuracion->telefono}}
</x-mail::message>
