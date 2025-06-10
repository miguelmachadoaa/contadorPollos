@include('partials.header')


<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner blog-single editContent">
        <div class="breadcrumbs-sub"> 
            <ul class="breadcrumbs-custom-path">
                <li class="right-side propClone"><a href="{{url('/')}}" class="editContent">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
                <li class="active editContent">{{$blog->titulo}}</li>
            </ul>
            </div>
</div>
</div>
</section>
<!-- breadcrumbs //-->

        <section class="w3l-blog-single">
            <div class="sec-padding editContent">
                <div class="container">
                    <div class="blog-grid">
                        <div class="blog-right">
                            
                            <!-- gallery -->
                            <div class="right-sidegride blog-right-single editContent">
                                <div class="comments-grid-right ">
                                    <h5 class="editContent">{{ __('main.nuestrosDestinos') }}</h5>
                                </div>
                                <div class="gallery-single-wthree">
                                    @foreach($destinos as $d)
                                    <div class="gallery-tab editContent">
                                        <a href="{{url('destinos/'.$d->slug)}}">
                                            <img src="{{url('uploads/imagenes/'.$d->imagen)}}" alt="{{$d->titulo}}" class="img-responsive">
                                        </a>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                            <!-- gallery -->


                            <!-- gallery -->
                            <div class="right-sidegride blog-right-single editContent">
                                <div class="comments-grid-right ">
                                    <h5 class="editContent">{{ __('main.nuestrasPromociones') }}</h5>
                                </div>
                                <div class="gallery-single-wthree">
                                    @foreach($paquetes as $p)
                                    <div class="gallery-tab editContent">
                                        <a href="{{url('paquetes/'.$p->slug)}}">
                                            <img src="{{url('uploads/imagenes/'.$p->imagen)}}" alt="{{$p->titulo}}" class="img-responsive">
                                        </a>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                            <!-- gallery -->



                           
                        </div>
                        <!--blog-grid-->
                        <div class="blog-left blog-right-single">
                            <div class="blog-grid-one">
                                <a href="{{url('blog/'.$blog->slug)}}"><img src="{{url('uploads/blogs/'.$blog->imagen)}}" alt=" " class="img-responsive"></a>
                                <h4><a href="{{url('blog/'.$blog->slug)}}" class="editContent">  {{$blog->titulo}} </a></h4>
    
                            </div>
    
                            <div class="blog-w3three-mid mt-3 editContent">
                                <div class="blog">
                                    {!! $blog->contenido !!}
                                </div>
                                <div class="share-icons mt-4">
    
                                    <h6>{{ __('main.compartirRedes') }}</h6>
    
                                    
                                    <a target="_blank" href="https://twitter.com/intent/tweet?url={{url('blog/'.$blog->slug)}}"><img style="width: 30px; height: 30px; margin-left: 1em" src="{{url('/fonts/x-twitter-brands.svg')}}">  </a>

                                    <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{url('blog/'.$blog->slug)}}">
                                        <img style="width: 30px; height: 30px; margin-left: 1em" src="{{url('/fonts/linkedin-in-brands.svg')}}">
                                    </a>
                                    <a target="_blank"  href="https://www.facebook.com/sharer/sharer.php?u={{url('blog/'.$blog->slug)}}"><img style="width: 30px; height: 30px; margin-left: 1em" src="{{url('/fonts/facebook-f-brands.svg')}}"></a>
                                   
    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog-grid// -->
                    
    
            </div>
        </section>
       
@include('partials.footer')