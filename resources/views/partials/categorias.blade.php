

        @foreach($categorias as $c)

        <div class="regular col-sm-4">

            <div class=" panel panel-default " style="
                padding: 0; 
                margin:0;
                ">

                <div class="panel-body">
                    <img
                    style="height: 200px;  width: 300px;"
                        @if(is_null($c->imagen))
                            src="{{url('/uploads/categorias/default.jpg')}}"
                        @else
                            src="{{url('/uploads/categorias/'.$c->imagen)}}"
                        @endif
                    alt="{{$c->titulo}}"
                    class="img-responsive gri-wid"></div>
                
                <div class="panel-footer background3" style="
                font-size: 24px;
                margin: 0;
                text-align: left;
                color:#fff
                
                ">
                    {{$c->titulo }} <span style="
                    text-align: right;
                    float: right;
                    font-size: 16px;
                    padding: 0.5em;
                    ">120 Items</span>
                </div>
              </div>
    
        </div>

        
        
        @endforeach
      
        <div class="clearfix"></div>

