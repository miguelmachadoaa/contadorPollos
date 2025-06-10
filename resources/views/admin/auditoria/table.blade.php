<table descriptio="" id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Realizado por </th>
            <th>Tipo</th>
            <th>Objeto</th>
            <th>Accion</th>
            <th>Datos</th>
            <th>Cliente</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach($auditoria as $a)

        <tr>
        <td>{{$a->id}}</td>
        <td>{{$a->name}}</td>
        <td>{{$a->type}}</td>
        <td>{{$a->type_id}}</td>
        <td>{{$a->accion}}</td>
        <td>

            @php  
            try {
                $data = json_decode($a->data);
               foreach ($data??[] as $key => $value) {

                if(!is_object($key) && !is_object($value)){
                    echo '<p>'.$key.':'.$value.'</p>';
                }
                
               }
            } catch (\Exception $e) {
                // Do something exceptional
            }
            @endphp
           
            
        </td>
        <td>
            {{$a->nombre.' '.$a->apellido}}
        </td>
        <td>
            {{$a->created_at->format('d/m/Y')}}
        </td>
        
    </tr>

        @endforeach
        
    </tbody>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Tipo</th>
            <th>Objeto</th>
            <th>Accion</th>
            <th>Datos</th>
            <th>Cliente</th>
            <th>Fecha</th>
        </tr>
    </tfoot>
</table>