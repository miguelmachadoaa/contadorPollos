<table class="table table-striped  w-100">

    <tr>
        <td>Id</td>
        <td>Titulo</td>
        <td>Imagen</td>
        <td>Acciones</td>
    </tr>

    @foreach($itinerarios as $itinerario)

    <tr>
        <td>{{$itinerario->id}}</td>
        <td>{{$itinerario->titulo}}</td>
        <td><img src="{{url('uploads/imagenes/'.$itinerario->imagen)}}" width="60px" alt=""></td>
        <td>
            <button type="button" data-id="{{$itinerario->id}}" data-json="{{json_encode($itinerario)}}" class="btn btn-primary editItinerario"><i class="fa fa-pencil"></i></button>

            <button type="button" data-id="{{$itinerario->id}}" class="btn btn-danger delItinerario"><i class="fa fa-trash"></i></button>
        </td>
    </tr>

    @endforeach

     
</table>