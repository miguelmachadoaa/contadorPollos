<div class="row">
    @foreach($imagenes as $i)
        <div class="col-sm-3">
            <img style="width: 60px" src="{{url('uploads/productos/'.$i->imagen)}}" alt="">
        </div>
    @endforeach
</div>