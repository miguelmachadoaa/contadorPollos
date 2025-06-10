 <section class="w3l-covers-18">
          <div class="covers-main editContent">
              <div class="container">
                <div class="main-titles-head ">
                  <h3 class="header-name">{{ __('main.ultimos_paquetes') }}  
                  </h3>
                  <p class="tiltle-para editContent ">{{ __('main.paquetes_medida') }} </p>
                </div>
                  <div class="gallery-image row">

                    @foreach($paquetes as $paquete)

                    <div class="col-lg-4 col-md-6">
                      <div class="img-box">
                        <img src="{{url('uploads/imagenes/'.$paquete->imagen)}}" alt="{{$paquete->titulo}}" class="img-responsive ">
                        <h5 class="my-2"><a href="{{url('paquetes/'.$paquete->slug)}}">{{$paquete->titulo}}</a></h5>
                        <div class="blog-date"> 
                          <p class="pos-date"><span class="fa fa-clock-o mr-1"></span>{{$paquete->dias}} Days</p> <p class="pos-date text-right"><span class="fa fa-users mr-1"></span>Max People : 5</p>
                        </div>
                          <p class="para">{{substr(strip_tags($paquete->descripcion), 0, 90).'...'}}</p>
                          <div class=" pt-3 " style="border-top: 1px solid rgba(0,0,0,0.1)">
                            <!-- h5>from $525</!-->
                            <a href="{{url('paquetes/'.$paquete->slug)}}" class="  btn btn-primary">Ver Paquete<span class="fa fa-chevron-right"></span></a>
                          </div>
                        </div>
                    </div>

                    @endforeach

                    </div>
                  </div>
              </div>
          </div>
      </section>