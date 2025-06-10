<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Email</th>
          <th>Profesion</th>
          <th>Saldo a favor</th>
          <th>Estado</th>
          <th>Fecha Creado</th>
          <th style="min-width: 250px !important;">Acciones</th>
        </tr>
    </thead>
    <tbody>
      @foreach($clientes as $cliente)
        <tr>
          <td>{{$cliente->id}}</td>
          <td>{{$cliente->nombre}}</td>
          <td>{{$cliente->apellido}}</td>
          <td>{{$cliente->email}}</td>
          <td>{{$cliente->profesion}}</td>
          <td>{{$cliente->saldo_cliente}}</td>
          <td>
            @if($cliente->estado == "verde")
              <span class="badge badge-success">Verde</span>
            @elseif($cliente->estado == "rojo")
              <span class="badge badge-danger">Rojo</span>
            @else
            <span class="badge badge-danger">Rojo</span>
            @endif
          </td>
          <td>{{$cliente->created_at->format('d/m/Y')}}</td>
          <td>
           
            @if(Auth::user()->rol==1)
            <a
            title="Editar"
            href="{{route('admin.clientes.edit', $cliente->id)}}"
            class="btn btn-warning"> <i class="fa fa-pencil"> </i> </a>

            @endif

            <a
            title="Detalle"
            href="{{route('admin.clientes.detail', $cliente->id)}}"
            class="btn btn-info"><i class="fa fa-eye"> </i> </a>

            <a
            href="{{route('admin.clientes.contract', $cliente->id)}}"
            title="Agregar Contrato"
            class="btn btn-success"><i class="fa fa-file"> </i> </a>


            <a
            href="{{route('admin.abonos.add', $cliente->id)}}"
            title="Agregar Abono"
            
            class="btn btn-dark "><i class="fa fa-money"> </i> </a>



            @php 

              $telefono = $cliente->direcciones->first()->telefono??null;
              if(substr($telefono, 0, 1)=='0'){ $telefono = substr($telefono, 1, strlen($telefono) - 1); }
              $telefono = str_replace("-", "", $telefono);
              $telefono = str_replace(".", "", $telefono);
              $telefono = str_replace(" ", "", $telefono);
              

              if(substr($telefono, 0, 1)!='2'){  echo '<a class="btn btn-success" target="_blank" href="https://wa.me/58'.$telefono.'"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                  <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                </svg></a>';}

            @endphp




          </td>
        </tr>
      @endforeach
        
       
    </tbody>
    <tfoot>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Profesion</th>
        <th>Saldo a favor </th>
        <th>Estado</th>
        <th>Fecha Creado</th>

        <th>Acciones</th>
      </tr>
    </tfoot>
</table>