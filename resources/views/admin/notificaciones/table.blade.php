<table descriptio="" id="example" class="table table-striped" style="width:100%">
  <thead>
      <tr>
          <th>Id</th>
          <th>Tipo</th>
          <th>Titulo</th>
          <th>Enlace</th>
          <th>Fecha Creado</th>
      </tr>
  </thead>
  <tbody>
      @foreach($notificaciones as $notificacion)

      <tr>
        <td>{{$notificacion->id}}</td>
        <td>{{$notificacion->type}}</td>
        <td>{{$notificacion->title}}</td>
        <td>
            @if($notificacion->type =="abono")
                <a  target="_blank" 
                href="{{route('admin.abonos.detail', $notificacion->type_id)}}" 
                class="grid " data-id="{{$notificacion->id}}">
            @elseif($notificacion->type =="cliente")
                <a  target="_blank"href="{{route('admin.clientes.detail', $notificacion->type_id)}}" class="grid " data-id="{{$notificacion->id}}">
            @elseif($notificacion->type =="contrato")
                <a  target="_blank"href="{{route('admin.clientes.detail', $notificacion->type_id)}}" class="grid " data-id="{{$notificacion->id}}">
            @elseif($notificacion->type =="pago")
                <a  target="_blank"target="_blank" href="{{route('admin.pagos.archivo', $notificacion->type_id)}}" class="grid " data-id="{{$notificacion->id}}">
            @else
                <a  target="_blank"href="#" class="grid " data-id="{{$notificacion->id}}">
            @endif

                <i class="fa fa-eye">Ir</i></a>
        </td>
        
        <td>{{$notificacion->created_at->format('d/m/Y')}}</td>
        
    </tr>

      @endforeach
     
  </tbody>
  <tfoot>
      <tr>
        <th>Id</th>
          <th>Tipo</th>
          <th>Titulo</th>
          <th>Enlace</th>
          <th>Fecha Creado</th>
      </tr>
  </tfoot>
</table>


