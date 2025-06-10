

        @foreach($blogs as $b)

        <div class="col-md-4 grid-stn simpleCart_shelfItem">
            <!-- normal -->
               <div class="ih-item square effect3 bottom_to_top">
                   <div class="bottom-2-top">
                   <div class="img">
                    <img
                    style="    height: 200px;  width: 300px;"
                    src="{{url('/uploads/blogs/'.$b->imagen)}}"
                    alt="{{$b->titulo}}"
                    class="img-responsive gri-wid"></div>
                   <div class="info">
                       <div class="pull-left ">
                           <h3>{{$b->titulo}}</h3>
                       </div>
                       
                       <div class="clearfix"></div>
                   </div></div>
               </div>
           <!-- end normal -->
           <div class="quick-view">
               <a href="{{url('blog/'.$b->slug)}}">Quick view</a>
           </div>
       </div>

        @endforeach

        
        

      
        <div class="clearfix"></div>