

        @foreach($productos as $p)

        <div class="col-md-4 grid-stn simpleCart_shelfItem mt-0">
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