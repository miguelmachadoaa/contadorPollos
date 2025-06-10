<table descriptio="" id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Forma de Pago </th>
            <th>Referencia</th>
            <th>Monto</th>
            <th>Estado</th>
            <th>Fecha Creado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($abonos as $abono)

        <tr>
        <td>{{$abono->id}}</td>
        <td>{{$abono->cliente->nombre.' '.$abono->cliente->apellido}}</td>
        <td>{!! $abono->fecha!!}</td>
        <td>{{$abono->formapago->nombre}}</td>
        <td>{{$abono->referencia}}</td>
        <td>{{$abono->monto}}</td>
        <!-- td>
            <img src="/uploads/abonos/{{$abono->archivo}}" alt="Imagen" width="60px">
        </!-->
        <td>
            @if($abono->estatus == 1)
            <span class="badge badge-success">Aprobado</span>
            @elseif($abono->estatus == 2)
            <span class="badge badge-danger">Rechazado</span>
            @else
            <span class="badge badge-warning">En Espera</span>
            @endif
        </td>
        <td>{{$abono->created_at->format('d/m/Y')}}</td>
        <td>
            @if(auth()->user()->rol!='4')
            <a
            href="{{route('admin.abonos.detail', $abono->id)}}"
            class="btn btn-info"><i class="fa fa-eye"> </i> </a>

            @endif

            <a target="_blank"
            href="{{route('admin.abonos.archivo', $abono->id)}}"
            class="btn btn-info"><i class="fa fa-file"> </i> </a>

        </td>
    </tr>

        @endforeach
        
    </tbody>
    <tfoot>
        <tr>
        <th>Id</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Forma de Pago </th>
            <th>Referencia</th>
            <th>Monto</th>
            <th>Estado</th>
            <th>Fecha Creado</th>
            <th>Acciones</th>
        </tr>
    </tfoot>
</table>