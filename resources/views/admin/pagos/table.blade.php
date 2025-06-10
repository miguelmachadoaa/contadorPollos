<table descriptio="" id="example" class="table table-striped" style="width:100%">
  <thead>
      <tr>
          <th>Id</th>
          <th>Cliente</th>
          <th>Tipo de Pago</th>
          <th>Informacion</th>
          <th>Monto</th>
          <th>Fecha</th>
          <th>Estado</th>
          <th>Fecha Creado</th>
          <th>Acciones</th>
      </tr>
  </thead>
  <tbody>
      @foreach($pagos as $pago)

      <tr>
        <td>{{$pago->id}}</td>
        <td>{{$pago->cliente->nombre.' '.$pago->cliente->apellido}}</td>
        <td>{{$pago->type}}</td>
        @if($pago->type=='contrato')
        <td>{{$pago->contrato->inscripcion??null}}</td>
        @elseif($pago->type=='cuota')
        <td>{{$pago->detalle->cuota??null}}</td>
        @else 
        <td>{{$pago->type_id}}</td>
        @endif
        
        <td>{{$pago->monto}}</td>
        <td>{{$pago->fecha}}</td>
        
        <td>
          @if($pago->estatus == 1)
            <span class="badge badge-success">Aprobado</span>
          @elseif($pago->estatus == 2)
            <span class="badge badge-danger">Rechazado</span>
          @else
            <span class="badge badge-warning">En Espera</span>
          @endif
        </td>
        <td>{{$pago->created_at->format('d/m/Y')}}</td>
        <td>

          <a target="_blank"
          href="{{route('admin.pagos.archivo', $pago->id)}}"
          class="btn btn-info"><i class="fa fa-eye"> </i> </a>

          @if(auth()->user()->rol == '1')

            @if($pago->type=='cuota')

              <button target="_blank"
              data-url="{{route('admin.pagos.delete', $pago->id)}}"
              class="btn btn-danger btnDelete"><i class="fa fa-trash"> </i> </button>

            @endif

          @endif

        </td>
    </tr>

      @endforeach
     
  </tbody>
  <tfoot>
      <tr>
        <th>Id</th>
        <th>Cliente</th>
        <th>Tipo de Pago</th>
        <th>Monto</th>
        <th>Fecha</th>

        <th>Estado</th>
        <th>Fecha Creado</th>
        <th>Acciones</th>
      </tr>
  </tfoot>
</table>


