@include('partials.header')
        <div class="header-end">
            <div class="container-fluid">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="./images/slide1.png" alt="...">
                        <div class="carousel-caption car-re-posn">
                            <h3>Ireverente</h3>
                            <h4>Te define</h4>
                            <span class="color-bar"></span>
                        </div>
                    </div>
                    <div class="item">
                      <img src="./images/slide2.png" alt="...">
                        <div class="carousel-caption car-re-posn">
                            <h3>Ireverente</h3>
                            <h4>Te define</h4>
                            <span class="color-bar"></span>
                        </div>
                    </div>
                    <div class="item">
                      <img src="./images/slide3.png" alt="...">
                        <div class="carousel-caption car-re-posn">
                            <h3>Ireverente</h3>
                            <h4>Te define</h4>
                            <span class="color-bar"></span>
                        </div>
                    </div>
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left car-icn" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right car-icn" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        

        <div class="shop-grid ">
            <div class="container">
                <div class="col-sm-8 titulo1 mb-4">
                    <h5>Conoce productos increibles</h5>
                    <h3 class="">Categorías destacadas</h3>
                </div>
            </div>
            <div class="container">
                @include('partials.categorias')
            </div>
        </div>

        <div class="shop-grid background1">
            <div class="container">
                <div class="col-sm-8 titulo1 mb-4">
                    <h5>Nuestros productos increibles</h5>
                    <h3 class="">Nuevos Productos </h3>
                </div>
                <div class="col-sm-4 text-right">
                    <a class="btn btn-primary btn-cuadrado btn1" href="{{url('/products')}}">Ver todos los productos </a>
                </div>
            </div>
            <div class="container">
                    @include('partials.productos')
            </div>
        </div>

        <div class="shop-grid">
            <div class="container-fluid" style="height: 50em;overflow: hidden;background-size: cover;background-image: url('http://irreverente.maymi.com.ve/assets/images/scena1.jpg');">
                <div class="col-sm-12 titulo1 mb-4" style="padding: 0;margin: 0;padding-top: 4em;">
                    <img src="" alt="" style="width: 100%;  padding: 0;">
                    <h5 style="
                        text-align: center;
                        font-size: 10em;
                        color: #fff;
                        /* border-bottom: #fff 2px solid; */
                    ">Diseño</h5>
                                        <h3 class="" style="
                        text-align: center;
                        color: #fff;
                        font-size: 5em;
                    ">Irreverente</h3>
                </div>
                
            </div>
        
        </div>

        @if(count($blogs))
        <div class="shop-grid">
            <div class="container">
                <div class="col-sm-8 titulo1 mb-4">
                    <h5>Nuestro Blog</h5>
                    <h3 class="">Ultimas Publicaciones </h3>
                </div>
                <div class="col-sm-4 text-right">
                    <a class="btn btn-primary btn-cuadrado btn1" href="{{url('blosg')}}">Ver mas </a>
                </div>
            </div>
            <div class="container">
                
                    @include('partials.blogs')

            </div>
        </div>
        @endif
       



        @if(count($videos))
        <div class="shop-grid">
            <div class="container">
                <div class="col-sm-8 titulo1 mb-4">
                    <h5>Videos</h5>
                    <h3 class="">Ultimas Publicaciones </h3>
                </div>
                <div class="col-sm-4 text-right">
                    <a class="btn btn-primary btn-cuadrado btn1" href="{{url('videos')}}">Ver mas </a>
                </div>
            </div>
            <div class="container">
                
                    @include('partials.videos')

            </div>
        </div>
        @endif


        <div class="sub-news">
            <div class="container">
                <form>
                    <h3>NewsLetter</h3>
                <input
                type="text"
                class="sub-email"
                value="Email"
                onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
                <a class="btn btn-default subs-btn" href="#" role="button">SUBSCRIBE</a>
                </form>
            </div>
        </div>
    @include('partials.footer')