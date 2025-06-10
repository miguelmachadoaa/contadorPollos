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
                    <div class="row">
                        <h1>{{$blog->titulo}}</h1>
                    </div>
                    <div class="row">
                        <div class="flexslider">
                            <ul class="slides">
                              <li data-thumb="{{url('uploads/blogs/'.$blog->imagen)}}">
                                  <div class="thumb-image">
                                      <img
                                      src="{{url('uploads/blogs/'.$blog->imagen)}}"
                                      alt="{{$blog->titulo}}"
                                      title="{{$blog->titulo}}"
                                      data-imagezoom="true"
                                      class="img-responsive">
                                  </div>
                              </li>
                             
                            </ul>
                          <div class="clearfix"></div>
                      </div>
                    </div>
                    <div class="row">
                        <h4>{!!$blog->contenido!!}</h4>
                    </div>
                    
                </div>
                <div class="col-md-4 showcase">
                    <div class="shocase-rt-bot">
                        <div class="float-qty-chart">
                        
                        
                    </div>
                    
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        
        <div class="specifications">
            <div class="container">
                <div class="shop-grid">
                    <div class="container">
                        <div class="col-sm-8 titulo1 mb-4">
                            <h5>Nuestro Blog</h5>
                            <h3 class="">Ultimas Publicaciones </h3>
                        </div>
                        <div class="col-sm-4 text-right">
                            <a class="btn btn-primary btn-cuadrado btn1" href="{{url('blogs')}}">Ver mas </a>
                        </div>
                    </div>
                    <div class="container">
                        
                            @include('partials.blogs')
        
                    </div>
                </div>
            </div>
        </div>
        


@include('partials.footer')