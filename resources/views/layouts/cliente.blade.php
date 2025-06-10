<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Migtours</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{url('assets/css/style-starter.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

  @yield('css')

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>

<body class="sidebar-menu-collapsed">
  <div class="se-pre-con"></div>
<section>
  <!-- sidebar menu start -->
  <div class="sidebar-menu sticky-sidebar-menu">

    <!-- logo start -->
    <div class="logo">
      <h1><a href="{{url('/admin')}}">Administrador Migtours</a></h1>
    </div>

    <div class="logo-icon text-center">
      <a href="{{url('/')}}" title="logo"><img src="{{url('assets/images/logo.png')}}" alt=""> </a>
    </div>
    <!-- //logo end -->

    <div class="sidebar-menu-inner">

      <!-- sidebar nav start -->
      <ul class="nav nav-pills nav-stacked custom-nav">
        <li class="active"><a href="{{'/home'}}"><i class="fa fa-home"></i><span> Dashboard</span></a>
        </li>

        
      </ul>
      <!-- //sidebar nav end -->
      <!-- toggle button start -->
      <a class="toggle-btn">
        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
      </a>
      <!-- //toggle button end -->
    </div>
  </div>
  <!-- //sidebar menu end -->
  <!-- header-starts -->
  <div class="header sticky-header">

    <!-- notification menu start -->
    <div class="menu-right">
      <div class="navbar user-panel-top">
        <!--div class="search-box">
          <form action="#search-results.html" method="get">
            <input class="search-input" placeholder="Search Here..." type="search" id="search">
            <button class="search-submit" value=""><span class="fa fa-search"></span></button>
          </form>
        </!--div -->
        <div class="user-dropdown-details d-flex">
          <div class="profile_details_left">
            <ul class="nofitications-dropdown notificacionesList">
              
              
            </ul>
          </div>
          <div class="profile_details">
            <ul>
              <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true"
                  aria-expanded="false">
                  <div class="profile_img">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=0D8ABC&color=fff&size=128
                    " class="rounded-circle" alt="" />
                    <div class="user-active">
                      <span></span>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
                  <li class="user-info">
                    <h5 class="user-name">{{ auth()->user()->name }}</h5>
                    <span class="status ml-2">Available</span>
                  </li>
                  <!--li> <a href="#"><i class="lnr lnr-user"></i>My Profile</a> </!--li>
                  <li> <a href="#"><i class="lnr lnr-users"></i>1k Followers</a> </li>
                  <li> <a href="#"><i class="lnr lnr-cog"></i>Setting</a> </li>
                  <li> <a href="#"><i class="lnr lnr-heart"></i>100 Likes</a> </li -->
                  <li class="logout"> <a href="{{url('/logout')}}"><i class="fa fa-power-off"></i> Logout</a> </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--notification menu end -->
  </div>
  <!-- //header-ends -->
  <!-- main content start -->
<div class="main-content " style="margin-top: 6em">

    @yield('content')

</div>
<!-- main content end-->
</section>


<div class="modal modalDelete" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Esta seguro que desea eliminar este registro?.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a href="#" class="btn btn-danger enlaceEliminar">Eliminar</a>
      </div>
    </div>
  </div>
</div>





  <!--footer section start-->
<footer class="dashboard">
  <p>&copy Migtours. All Rights Reserved | Design by <a href="https://maymi.com.ve/" target="_blank"
      class="text-primary">Agencia Maymi.</a></p>
</footer>
<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- /move top -->


<script src="{{url("assets/js/jquery-3.3.1.min.js")}}"></script>
<script src="{{url('assets/js/jquery-1.10.2.min.js')}}"></script>

<!-- chart js -->
<script src="{{url('assets/js/Chart.min.js')}}"></script>
<script src="{{url('assets/js/utils.js')}}"></script>
<!-- //chart js -->

<!-- Different scripts of charts.  Ex.Barchart, Linechart -->
<script src="{{url('assets/js/bar.js')}}"></script>
<script src="{{url('assets/js/linechart.js')}}"></script>
<!-- //Different scripts of charts.  Ex.Barchart, Linechart -->


<script src="{{url('assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{url('assets/js/scripts.js')}}"></script>

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>

  function cargarNotificaciones(){
    $.ajax({
        type: 'get',
        url: urlNotifiaciones,
        success: function(data) {
            $('.notificacionesList').html(data);
        }
    });
  }

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('15e4d0d521d176a02c00', {
    cluster: 'us2'
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function(data) {
    cargarNotificaciones();
  });
</script>




<!-- close script -->
<script>

var urlNotifiaciones = "{{route('admin.notificaciones.list')}}";
var urlNotifiacionesUpdate = "{{route('admin.notificaciones.update')}}";

  $(document).ready(function(){
    cargarNotificaciones();

    $(document).on('click', '.updateNotificacion', function(e){

      e.preventDefault();

      var id = $(this).data('id');
      var enlace = $(this).attr('href');

      $.ajax({
          type: 'Post',
          data: {id},
          url: urlNotifiacionesUpdate,
          success: function(data) {
          }
          
      });

      if(enlace != '#'){
        window.location = enlace;
        $(this).fadeOut();
      }

    })



  });




  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="{{url('assets/js/modernizr.js')}}"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->

<!-- Bootstrap Core JavaScript -->
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>

  $('.btnDelete').on('click', function(){

    $('.enlaceEliminar').attr('href', $(this).data('url'));

    $('.modalDelete').modal('show');

  });

</script>

</body>


@yield('js')

</html>
  