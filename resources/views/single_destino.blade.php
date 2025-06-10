@include('partials.header')


<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner blog-single editContent" style="background: url({{url('uploads/imagenes/'.$destino->imagen)}}) no-repeat center;
    padding: 30px 0px 30px;
    background-size: cover;">
        <div class="breadcrumbs-sub"> 
            <ul class="breadcrumbs-custom-path">
                <li class="right-side propClone"><a href="{{url('/')}}" class="editContent">{{__('main.home') }} <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
                <li class="active editContent">{{$destino->titulo}}</li>
            </ul>
            </div>
</div>
</div>
</section>
<!-- breadcrumbs //-->

        <section class="w3l-blog-single">
            <div class="sec-padding editContent">
                <div class="container">
                    <div class="blog">
                           
                        <!--blog-grid-->
                        <div class="blog-left blog-right-single">
                            <div class="blog-grid-one ">
                                
                                <h4><a href="blog-single.html" class="editContent">  {{$destino->titulo}} </a></h4>

                                <div class="sub-paragraph mt-2 mb-2">
                                {!!$destino->descripcion!!}

                                </div>
                                
                            </div>

                            <div class="portfolio-item row">

                            @foreach($imagenes as $imagen)
                        
                                    <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                                       <a href="{{url('uploads/imagenes/'.$imagen->url)}}" class="fancylight popup-btn" data-fancybox-group="light"> 
                                       <img class="img-fluid" src="{{url('uploads/imagenes/'.$imagen->url)}}" alt="">
                                       </a>
                                </div>
            
                                @endforeach
                            </div>
                        
                        </div>
                    </div>
                    <!-- blog-grid// -->
                    
                </div>
    
            </div>
        </section>

         <section class="w3l-covers-18">
          <div class="covers-main editContent">
              <div class="container">
                <div class="main-titles-head ">
                  <h3 class="header-name">{{ __('main.paquetesRelacionados') }}  
                  </h3>
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
                          <div class="top-gap">
                            <h5>{{ __('main.saberMas') }} </h5>
                            <a href="{{url('paquetes/'.$paquete->slug)}}" class="icon text-center"><span class="fa fa-chevron-right"></span></a>
                          </div>
                        </div>
                    </div>

                    @endforeach

                    </div>
                  </div>
              </div>
          </div>
      </section>
       
@include('partials.footer')