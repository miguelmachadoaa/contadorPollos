<x-mail::message>

<p>Notificación de Vencimiento de Cuota</p>

<p>Hola Estimado usuario, {{$abono->cliente->nombre }} {{$abono->cliente->apellido }}

    </p>

    <p>Le enviamos este correo electrónico para informarle que la cuota #{{$cuota->cuota}} por un monto de {{$cuota->monto}} USD  ha vencido.  </p>

    <p>  Su fecha de vencimiento fue el <b>{{$cuota->fecha}}</b> . Para evitar cargos por mora, le solicitamos realizar el pago a la brevedad posible.  </p>

    <p> Si ya ha realizado el pago, por favor ignore este correo electrónico. </p>
    <p> Si tiene alguna pregunta o necesita ayuda con el proceso de pago, no dude en contactarnos. </p>

    <p>
        Atentamente,

    </p>

    Migtours de Venezuela
</x-mail::message>
