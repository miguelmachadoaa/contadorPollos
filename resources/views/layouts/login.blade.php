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
  
<div class="main-content " style="margin-top: 8em">

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

<!-- close script -->
<script>
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
  