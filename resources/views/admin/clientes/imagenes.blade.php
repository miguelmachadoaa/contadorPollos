<div class="row">
    @foreach($imagenes as $i)
        <div class="col-sm-12 mb-4">
            <a target="_blank" href="{{url('uploads/clientes/'.$i->id_cliente.'/'.$i->imagen)}}">
                <img style="width: 100%" src="{{url('uploads/clientes/'.$i->id_cliente.'/'.$i->imagen)}}" alt="">
            </a>
        </div>
    @endforeach
</div>