<div class="row">
    @foreach($imagenes as $i)
        <div class="col-sm-3">
            <img style="min-width: 120px" src="{{url('uploads/imagenes/'.$i->url)}}" alt="{{$i->titulo}}">
            <button type="button" role="button" data-id="{{$i->id}}" class="mt-1 w-100 btn btn-danger delImagen"><i class="fa fa-trash"></i></button>
        </div>
    @endforeach
</div>