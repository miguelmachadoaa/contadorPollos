
@include('partials.header')


<section class="w3l-main-slider" id="home">
    <!-- main-slider -->
    <div class="companies20-content">
      
      <div class="owl-one owl-carousel owl-theme">

            @foreach($sliders as $slider)

                <div class="item text-center">
                    <li>
                        <div class="slider-info banner-view bg bg2" data-selector=".bg.bg2" style="    background: url({{url('uploads/sliders/'.$slider->imagen)}}) no-repeat center;background-size: cover;">
                            <div class="banner-info">
                            <div class="container">
                                <div class="banner-info-bg mr-auto">
                                <h5>{{$slider->titulo}}</h5>
                                <p>{{strip_tags($slider->descripcion)}}</p>
                                <a class="btn btn-theme2 mt-lg-5 mt-4" href="{{url('contacto')}}">{{__('main.contacto')}}</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </li>
              </div>

            @endforeach
        
      </div>
    </div>
    <script src="{{url('frontend/assets/js/owl.carousel.js')}}"></script>
    <!-- script for -->
    <script>
      $(document).ready(function () {
        $('.owl-one').owlCarousel({
          loop: true,
          margin: 0,
          nav: false,
          dots:true,
          responsiveClass: true,
          autoplay: false,
          autoplayTimeout: 5000,
          autoplaySpeed: 1000,
          autoplayHoverPause: false,
          responsive: {
            0: {
              items: 1,
              nav: false
            },
            480: {
              items: 1,
              nav: false
            },
            667: {
              items: 1,
              nav: true
            },
            1000: {
              items: 1,
              nav: true
            }
          }
        })
      })
    </script>
    <!-- //script -->
    <!-- /main-slider -->
  </section>
  
  
  
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
                          <div class="top-gap">
                            <h5>from $525</h5>
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
  
  <section class="w3l-clients" id="client">
      <div class="call-w3">
          <div class="container text-center">
              <div class="title-head">
              <h3>{{ __('main.descubre') }} </h3>
              <p>{{__('main.descubreDetalle')}}</p>
              <a class="btn btn-theme2 mt-lg-5 mt-4" href="{{url('contacto')}}">{{__('main.contacto')}}</a>
          </div>
            
                </div>
          </div>
  </section>


       
@include('partials.footer')