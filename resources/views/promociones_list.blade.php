<section class="w3l-covers-18">
    <div class="covers-main editContent">
        <div class="container">
          <div class="main-titles-head ">
            <h3 class="header-name">{{ __('main.conocePromociones') }} {{date('Y')}}
            </h3>
            <p class="tiltle-para editContent ">{{ __('main.ultimasPromociones') }} </p>
          </div>
            <div class="gallery-image row">

              @foreach($promociones as $promo)

              <div class="col-lg-4 col-md-6">
                <div class="img-box">
                  <a href="{{url('promociones/'.$promo->slug)}}"><img src="{{url('uploads/imagenes/'.$promo->imagen)}}" alt="{{$promo->titulo}}" class="img-responsive "></a>
                  <h5 class="my-2"><a href="{{url('promociones/'.$promo->slug)}}">{{$promo->titulo}}</a></h5>
                  </div>
              </div>

              @endforeach

              </div>
            </div>
        </div>
</section>