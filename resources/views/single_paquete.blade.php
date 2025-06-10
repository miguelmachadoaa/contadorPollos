@include('partials.header')


<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner blog-single editContent" style="background: url({{url('uploads/imagenes/'.$paquete->imagen)}}) no-repeat center;
    padding: 30px 0px 30px;
    background-size: cover;">
        <div class="breadcrumbs-sub"> 
            <ul class="breadcrumbs-custom-path">
                <li class="right-side propClone"><a href="{{url('/')}}" class="editContent">{{__('main.home') }} <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
                <li class="active editContent">{{$paquete->titulo}}</li>
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
                                
                                <h2><a href="blog-single.html" class="editContent">  {{$paquete->titulo}} </a></h2>

                                <div class="sub-paragraph mt-2 mb-2">
                                {!!$paquete->descripcion!!}

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

                            @if(count($itinerarios))

                            <div class="row mt-4">
                                <div class="col-sm-12 p-4 text-center">
                                    <h3>Itinerario</h3>
                                </div>
                            </div>
                                <div class="row">
                                @foreach($itinerarios as $itinerario)



                                <div class="col-sm-6 mt-4">
                                    <div class="row">
                                        <div class="col-sm-12 mt-4 mb-4">
                                            <h4>{{$itinerario->titulo}}</h4>
                                        </div>
                                        <div class="col-sm-12">
                                            {!!$itinerario->descripcion !!}
                                        </div>
                                        <div class="col-sm-12 mt-4">
                                            <img class="img-fluid" src="{{url('uploads/imagenes/'.$itinerario->imagen)}}" alt="{{$itinerario->titulo}}">
                                        </div>
                                    </div>
                                    
                                </div>
                            
                                    
            
                                @endforeach

                            </div>

                            @endif
                          
                        </div>
                        
                    </div>
                    <!-- blog-grid// -->
                    
                </div>
    
            </div>
        </section>



        <section class="w3l-blog-single">
            <div class="sec-padding editContent">
                <div class="container">
                    <div class="blog">
                           
                        <!--blog-grid-->
                        <div class="blog-left blog-right-single">
                           


                            <div class="row mt-4">
                                <div class="col-sm-12 p-4 text-center">
                                    <h3>{{__('main.informacion') }} </h3>

                                    <div class="col-sm-12">
                                        {!!$paquete->informacion !!}
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">



                                <div class="col-sm-6 mt-4">
                                    <div class="row">
                                        <div class="col-sm-12 mt-4 mb-4">
                                            <h4>{{__('main.incluye') }} </h4>
                                        </div>
                                        <div class="col-sm-12">
                                            {!!$paquete->include !!}
                                        </div>
                                        
                                    </div>
                                    
                                </div>


                                <div class="col-sm-6 mt-4">
                                    <div class="row">
                                        <div class="col-sm-12 mt-4 mb-4">
                                            <h4>{{__('main.noIncluye') }} </h4>
                                        </div>
                                        <div class="col-sm-12">
                                            {!!$paquete->noinclude !!}
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            
                                    
            

                            </div>
                          
                        </div>
                        
                    </div>
                    <!-- blog-grid// -->
                    
                </div>
    
            </div>
        </section>
       
@include('partials.footer')