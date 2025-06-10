@include('partials.header')

        <div class="head-bread">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Men</a></li>
                    <li class="active">Shop</li>
                </ol>
            </div>
        </div>
        <div class="showcase-grid">
            <div class="container">
                <div class="col-md-8 showcase">
                    <div class="flexslider">
                          <ul class="slides">
                            @foreach($producto->imagenes as $imagen)
                            <li data-thumb="{{url('uploads/productos/'.$imagen->imagen)}}">
                                <div class="thumb-image">
                                    <img
                                    src="{{url('uploads/productos/'.$imagen->imagen)}}"
                                    alt="{{$producto->titulo}}"
                                    title="{{$producto->titulo}}"
                                    data-imagezoom="true"
                                    class="img-responsive">
                                </div>
                            </li>
                            @endforeach
                           
                          </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 showcase">
                    <div class="showcase-rt-top">
                        <div class="pull-left shoe-name">
                            <h3>{{$producto->titulo}}</h3>
                            <p>
                                @foreach($producto->categorias as $cp)
                                    <a
                                    class="btn btn-xs btn-danger"
                                    target="_blank"
                                    href="{{url('categorias/'.$cp->id)}}"
                                    >
                                        {{$cp->titulo}}
                                    </a>
                                @endforeach
                            </p>
                            <h4>&#36;{{$producto->precio}}</h4>
                        </div>
                        <div class="pull-left rating-stars">
                            <ul>
                                <li>
                                    <a href="#" class="active">
                                        <span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="active">
                                        <span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="active">
                                        <span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="glyphicon glyphicon-star star-stn" aria-hidden="true"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <hr class="featurette-divider">
                    <div class="shocase-rt-bot">
                        <div class="float-qty-chart">
                        <ul>
                            <li class="qty">
                                <h3>Tallas</h3>
                                <select class="form-control siz-chrt">
                                  <option>6 US</option>
                                  <option>7 US</option>
                                  <option>8 US</option>
                                  <option>9 US</option>
                                  <option>10 US</option>
                                  <option>11 US</option>
                                </select>
                            </li>
                            <li class="qty">
                                <h4>Cantidad</h4>
                                <select class="form-control qnty-chrt">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                  <option>6</option>
                                  <option>7</option>
                                </select>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        </div>
                        <ul>
                            <li class="ad-2-crt simpleCart_shelfItem">
                                <a class="btn item_add addtocart" href="#" role="button">Agregar al Carrito</a>
                                <a class="btn addtocart_checkout" href="#" role="button">Comprar Ahora</a>
                            </li>
                        </ul>
                    </div>
                    <div class="showcase-last">
                        <h3>Detalles</h3>
                        <p>
                            {!! $producto->descripcion !!}
                        </p>
                    </div>
                </div>
        <div class="clearfix"></div>
            </div>
        </div>
        
        <div class="specifications">
            <div class="container">
              <h3>Detalles</h3>
                <div class="detai-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills tab-nike" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Caracteristcas</a>
                    </li>
                    <li role="presentation">
                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Condiciones</a>
                    </li>
                    <li role="presentation">
                        <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Detalles</a>
                    </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                    <p> {!! $producto->caracteristicas !!}</p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                    <p> {!! $producto->Condiciones !!}.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                        {!! $producto->descripcion !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="you-might-like">
            <div class="container">
                <h3 class="you-might">Otras personas tambien vieron</h3>
                
                @foreach($productos as $p)

                    <div class="col-md-4 grid-stn simpleCart_shelfItem">
                        <!-- normal -->
                        <div class="ih-item square effect3 bottom_to_top">
                            <div class="bottom-2-top">
                            <div class="img">
                                <img
                                style="     width: 250px;"
                                    @if(is_null($p->imagenes()->first()))
                                        src="{{url('/uploads/productos/default.jpg')}}"
                                    @else
                                        src="{{url('/uploads/productos/'.$p->imagenes()->first()->imagen)}}"
                                    @endif
                                alt="{{$p->titulo}}"
                                class="img-responsive gri-wid"></div>
                            <div class="info">
                                <div class="pull-left styl-hdn">
                                    <h3>{{$p->titulo}}</h3>
                                </div>
                                <div class="pull-right styl-price">
                                    <p>
                                        <a  href="#" class="item_add">
                                                <span
                                                class="glyphicon glyphicon-shopping-cart grid-cart"
                                                aria-hidden="true"></span>
                                                <span class=" item_price">{{$p->precio}}</span>
                                        </a>
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div></div>
                        </div>
                    <!-- end normal -->
                    <div class="quick-view">
                        <a href="{{url('single/'.$p->id)}}">Detalles</a>
                    </div>
                </div>

                    @endforeach
                
                    <div class="clearfix"></div>

            </div>
        </div>


@include('partials.footer')