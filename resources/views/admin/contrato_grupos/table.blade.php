<table descriptio="" id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Inscripicion</th>
            <th>Nombre Cliente</th>
            <th>Producto</th>
            <th>Monto</th>
            <th>Cuotas</th>
            <th>Proximo Pago</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($grupos->contratos as $c)
        <tr>
          <td>{{$c['inscripcion']}}</td>
          <td>{{$c['cliente']['nombre'].' '.$c['cliente']['apellido']}}</td>
          <td>{{$c['descripcion']}}</td>
          <td>{{$c['monto']}}</td>
          
          <td>{{$c['detalles'][0]['monto']}}</td>
          <td>
            @foreach($c['detalles']  as $detalle)

              @if($detalle['estatus']=='0')

                <div class="badge badge-ligth" style="border: 1px solid rgba(0,0,0,0.5)  ">{{$detalle['cuota']}}</div>

              @endif

              @if($detalle['estatus']=='1')

                <div class="badge badge-success" style="border: 1px solid rgba(0,0,0,0.5)  ">{{$detalle['cuota']}}</div>

              @endif

              @if($detalle['estatus']=='2')

                <div class="badge badge-danger" style="border: 1px solid rgba(0,0,0,0.5)  ">{{$detalle['cuota']}}</div>

              @endif

            @endforeach
        </td>
          <td>
            @if($c['estatus']=='activo')
            <span class="badge badge-success">Activo</span>
            @elseif($c['estatus']=='desactivado')
            <span class="badge badge-warning">Inactivo</span>
            @elseif($c['estatus']=='lista_compra')
            <span class="badge badge-info">Lista de compra</span>
            @elseif($c['estatus']=='adjudicado')
            <span class="badge badge-primary">Adjudicado</span>
            @else
            <span class="badge badge-danger">Retirado</span>
            @endif
          </td>
          <td>
            <a
            target="_blank"
            href="{{route('admin.clientes.detail', $c['cliente']['id'])}}"
            class="btn btn-info"><i class="fa fa-eye"> </i> </a>


            <a target="_blank"
            href= "{{url('admin/contratos/'.$c['id']."/archivo")}}"
            class="btn btn-warning">
              <i class="fa fa-file"></i>
            </a>
            @if(Auth::user()->rol==1)
            <a  
            href= "{{url('admin/contratos/'.$c['id']."/edit")}}"
            class="btn btn-primary">
              <i class="fa fa-pencil"></i>
            </a>

            @if($c['estatus']=='desactivado')
            <button
            data-id="{{$c['id']}}"
            data-url="{{url('/admin/contrato/'.$c['id'].'/delete')}}"
            class="btn btn-danger btnDelete">
              <i class="fa fa-trash"></i>
            </button>
            @endif


            @endif


           
          </td>
      </tr>

        @endforeach
       
    </tbody>
    <tfoot>
        <tr>
          <th>Id</th>
          <th>Nombre Cliente</th>
          <th>Producto</th>
          <th>Monto</th>
          <th>Estado</th>
          <th>Fecha Creado</th>
          <th>Acciones</th>
        </tr>
    </tfoot>
</table>