<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Migtours</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{url('assets/css/style-starter.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" >
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


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
      <h1><a href="{{url('/admin')}}">Administrador La Caridad</a></h1>
    </div>

    <div class="logo-icon text-center">
      <a href="{{url('/')}}" title="logo"><img src="{{url('assets/images/logo.png')}}" alt=""> </a>
    </div>
    <!-- //logo end -->

    <div class="sidebar-menu-inner">

      <!-- sidebar nav start -->
      <ul class="nav nav-pills nav-stacked custom-nav">
        <li class="active"><a href="{{'/home'}}"><i class="fa fa-home"></i><span> Dashboard</span></a></li>

        <li><a href="{{route('admin.configuracion.index')}}"><i class="fa fa-cog"></i> <span>Configuracion</span></a></li>
        <li><a href="{{route('admin.users.index')}}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>

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
        <!-- div class="search-box">
          <form action="#search-results.html" method="get">
            <input class="search-input" placeholder="Search Here..." type="search" id="search">
            <button class="search-submit" value=""><span class="fa fa-search"></span></button>
          </form>
        </!-->
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
                    
                    <div class="user-active">
                      <span></span>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
                  <li class="user-info">
                    <h5 class="user-name">{{ auth()->user()?->name }}</h5>
                    <span class="status ml-2">Available</span>
                  </li>
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


<div class="modal modalDuplicar" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Duplicar Registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Esta seguro que desea duplicar este registro?.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a href="#" class="btn btn-danger enlaceDuplicar">Duplicar</a>
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

    $('.email').blur(function(){

    const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(!regex.test($(this).val())){
    $(this).addClass('is-invalid');
    $(this).focus();
    $(this).next().html('Debe ingresar un email valido');
    }else{
        $(this).removeClass('is-invalid');
        $(this).next().html('');
    }
  });

  $('.alfanumerico').blur(function(){

    const regex = /^[ a-zA-Záéíóúñü]+$/;

    console.log($(this).val());

    console.log(regex.test($(this).val()));

    if(!regex.test($(this).val())){
      $(this).addClass('is-invalid');
      $(this).focus();
      $(this).next().html('Solo debe contener letras');
    }else{
        $(this).removeClass('is-invalid');
        $(this).next().html('');
    }
  });

  $('.numerico').blur(function(){

    const regex = /^[0-9]+$/;

    console.log($(this).val());

    console.log(regex.test($(this).val()));

    if(!regex.test($(this).val())){
    $(this).addClass('is-invalid');
    $(this).focus();
    $(this).next().html('Solo debe contener numeros');
    }else{
        $(this).removeClass('is-invalid');
        $(this).next().html('');
    }
  });

  function validarRequerido(){

  const camposRequeridos = $('.requerido');

  let valido = true;

  camposRequeridos.each(function() {
      console.log($(this).val());
      if ($(this).val() === "") {
          valido = false;
          $(this).next().html('Campo requerido');
          $(this).addClass('is-invalid');
      } else {
          $(this).removeClass('is-invalid');
          $(this).next().html('');
      } // Imprime el contenido textual de cada elemento
  });

  return valido;

  }

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
var urlNotifiacionesUpdateAll = "{{route('admin.notificaciones.updateall')}}";

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

    $(document).on('click', '.updateNotificacionAll', function(e){

      e.preventDefault();

      var id = $(this).data('id');
      var enlace = $(this).attr('href');

      $.ajax({
          type: 'Post',
          data: {id},
          url: urlNotifiacionesUpdateAll,
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

<script defer  src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script  defer   src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<script>

  $(document).ready(function() {
    $('.select2').select2( );
  });


  $('.btnDelete').on('click', function(){

    console.log($(this).data('url'));

    $('.enlaceEliminar').attr('href', $(this).data('url'));

    $('.modalDelete').modal('show');

  });


  $('.btnDuplicar').on('click', function(){

    $('.enlaceDuplicar').attr('href', $(this).data('url'));

    $('.modalDuplicar').modal('show');

    });


</script>

</body>


@yield('js')

</html>
  