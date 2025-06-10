<!-- blog block -->
<section class="w3l-services-6">
  <div class="services-layout editContent">
    <div class="container">

      <div class="main-titles-head row">
        <h3 class="header-name">{{__('main.exploraMundo')}} </h3>
      </div>
      
    <div class="blog-grids row">

      @foreach($blogs as $blog)

      <div class="col-lg-4 col-md-6 blog-grid mt-4" id="zoomIn">
          <a href="{{url('blog/'.$blog->slug)}}">
              <figure><img src="{{url('uploads/blogs/'.$blog->imagen)}}" style="height: 15em" class="img-fluid" alt=""></figure>
          </a>
          <div class="blog-info">
            <h3><a href="{{url('blog/'.$blog->slug)}}">
              {{$blog->titulo}}</a> </h3>
              <div class="blog-date">  <p class="pos-date"><span class="fa fa-clock-o mr-1"></span>{{$blog->updated_at->format('d/m/Y')}}</p> 
                </div>
          </div>
      </div>

      @endforeach
     
  </div>
  
    </div>
  </div>
</section>