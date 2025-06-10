
@include('partials.header')


<section class="w3l-main-slider" id="home">
    <!-- main-slider -->
    <div class="companies20-content">
      
      <div class="owl-one owl-carousel owl-theme">

            @foreach($sliders as $slider)

                <div class="item text-center">
                    <li>
                        <div class="slider-info banner-view bg bg2" data-selector=".bg.bg2" style="background: url({{url('uploads/sliders/'.$slider->imagen)}}) no-repeat center;
    background-size: cover;">
                            <div class="banner-info">
                              <div class="container">
                                  <div class="banner-info-bg mr-auto">
                                    <h5 class="dancing-script-400">{{$slider->titulo}}</h5>
                                    <a class="btn  btn-outline-light mt-lg-5 mt-4" href="{{url('contacto')}}">{{__('main.contacto')}}</a>
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
          autoplay: true,
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
  
  
    <section class="w3l-specification-6">
        <div class="specification-layout editContent">
            <div class="container-fluid">

                <div class="row text-left img-grids">
                   

                    @foreach($destinos as $destino)

                        @if($loop->iteration == '1')

                        <div class="col-sm-12 p-0">
                            <div class="row ">
                                <div class="col-sm-3 p-0 m-0">
                                    <div class="ser-bg{{$loop->iteration%4==0?'4':$loop->iteration%4}}" style="background: url({{url('uploads/imagenes/'.$destino->imagen)}}) no-repeat center;  background-size: cover;">
                                        <div class="p-md-5 p-3">
                                            <h4><a class="libre-baskerville-regular" href="{{url('destinos/'.$destino->slug)}}">{{$destino->titulo}}</a></h4>
                                            <p class="libre-baskerville-regular" >{{substr(strip_tags($destino->descripcion), 0, 90).'...'}} </p>
            
                                        </div>
                                    </div>
                                </div>


                        @elseif($loop->iteration =='4' || $loop->iteration =='8')

                                <div class="col-sm-3 p-0 m-0">
                                    <div class="ser-bg{{$loop->iteration%4==0?'4':$loop->iteration%4}}" style="background: url({{url('uploads/imagenes/'.$destino->imagen)}}) no-repeat center;  background-size: cover;">
                                        <div class="p-md-5 p-3">
                                            <h4><a class="libre-baskerville-regular" href="{{url('destinos/'.$destino->slug)}}">{{$destino->titulo}}</a></h4>
                                            <p class="libre-baskerville-regular" >{{substr(strip_tags($destino->descripcion), 0, 90).'...'}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 p-0">
                            <div class="row">

                       



                        @elseif($loop->iteration == '12')

                                <div class="col-sm-3 p-0 m-0">
                                    <div class="ser-bg{{$loop->iteration%4==0?'4':$loop->iteration%4}}" style="background: url({{url('uploads/imagenes/'.$destino->imagen)}}) no-repeat center;  background-size: cover;">
                                        <div class="p-md-5 p-3">
                                            <h4><a class="libre-baskerville-regular" href="{{url('destinos/'.$destino->slug)}}">{{$destino->titulo}}</a></h4>
                                            <p class="libre-baskerville-regular" >{{substr(strip_tags($destino->descripcion), 0, 90).'...'}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @else

                        <div class="col-sm-3 p-0 m-0">
                            <div class="ser-bg{{$loop->iteration%4==0?'4':$loop->iteration%4}}" style="background: url({{url('uploads/imagenes/'.$destino->imagen)}}) no-repeat center;  background-size: cover;">
                                <div class="p-md-5 p-3">
                                    <h4><a class="libre-baskerville-regular" href="{{url('destinos/'.$destino->slug)}}">{{$destino->titulo}}</a></h4>
                                            <p class="libre-baskerville-regular">{{substr(strip_tags($destino->descripcion), 0, 90).'...'}} </p>
        
                                </div>
                            </div>
                        </div>


                        @endif

                    @endforeach

                    
                </div>
            </div>
        </div>
    </section>
  
@include('blogs_list')
       
@include('partials.footer')