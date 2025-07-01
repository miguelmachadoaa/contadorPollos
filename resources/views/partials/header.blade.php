<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Grupo La Caridad</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{url('frontend/assets/css/style-starter.css')}}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Faustina:ital,wght@0,300..800;1,300..800&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Questrial&family=Sorts+Mill+Goudy:ital@0;1&display=swap" rel="stylesheet">

    <link href="//fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

   
	

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


	<style type="text/css">

		.questrial-regular {
		  font-family: "Questrial", sans-serif;
		  font-weight: 400;
		  font-style: normal;
		}

		.libre-baskerville-regular {
			  font-family: "Libre Baskerville", serif;
			  font-weight: 400;
			  font-style: normal;
			}


		.faustina-regular {
		  font-family: "Faustina", serif;
		  font-optical-sizing: auto;
		  font-weight: 400;
		  font-style: normal;
		}


		.eb-garamond-regular {
		  font-family: "EB Garamond", serif;
		  font-optical-sizing: auto;
		  font-weight: 400;
		  font-style: normal;
		}

		.sorts-mill-goudy-regular {
		  font-family: "Sorts Mill Goudy", serif;
		  font-weight: 400;
		  font-style: normal;
		}

		


		
	</style>


  </head>
  <body id="home">
<section class=" w3l-header-4 header-sticky">
	<!--header-->
	<header id="site-header" class="fixed-top">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark stroke">
				<h1><a class="navbar-brand" href="{{url('/')}}">
					<img src="{{url('images/logo_150.png')}}" alt="Decohouse">
				</a></h1>
				<!-- if logo is image enable this   
			<a class="navbar-brand" href="#index.html">
				<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
			</a> -->
				<button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
					<span class="navbar-toggler-icon fa icon-close fa-times"></span>
					
				</button>
	  
				<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
					<ul class="navbar-nav ml-lg-5">

						<li class="nav-item  ">
							<a class="nav-link libre-baskerville-regular" href="{{url('contacto')}}">{{ __('main.contacto') }}</a>
						</li>

					</ul>
				<ul class="navbar-nav ml-auto">
						<li class="nav-item ml-4">
							<a class="nav-link phone libre-baskerville-regular" ><span class="fa fa-phone"></span> {{$configuracion->whatsapp}}</a>
						</li>

						@if($configuracion->show_idioma)

						 @if(Session::get('locale')== 'es' or Session::get('locale')== 'en') 
							 @if(Session::get('locale')== 'es') 
								<li class="nav-item active">
									<a class=" nav-link" href="{{ route('setlenguaje', ['locale' => 'en']) }}"><img width="32px" src="{{url('/images/en.png')}}" alt=""></a>
								</li>
							 @endif

							 @if(Session::get('locale')== 'en')
 
								<li class="nav-item active">
									<a class=" nav-link" href="{{ route('setlenguaje', ['locale' => 'es']) }}"><img width="32px" src="{{url('/images/es.png')}}" alt=""></a>
								</li>

							@endif
							@else
								<li class="nav-item active">
									<a class=" nav-link" href="{{ route('setlenguaje', ['locale' => 'en']) }}"><img width="32px" src="{{url('/images/en.png')}}" alt=""></a>
								</li>
							@endif
						
						@endif
				<!-- search -->
						 <div class="search-right">
					<!-- search popup -->
					<div id="search" class="pop-overlay">
						<div class="popup">
							<form action="#" method="GET" class="d-flex">
								<input type="search" placeholder="Search.." name="search" required="required" autofocus>
								<button type="submit">{{ __('main.buscar') }}</button>
							</form>

							<a class="close" href="#close">&times;</a>
						</div>
					</div>
					<!-- /search popup -->
				</div>
					<!--/ search -->
					</ul>
				</div>
				        <!-- toggle switch for light and dark theme >
						<div class="mobile-position">
							<label class="theme-selector">
							  <input type="checkbox" id="themeToggle">
							  <i class="gg-sun">EN</i>
							  <i class="gg-moon">ES</i>
							</label>
						  </div>
						  < //toggle switch for light and dark theme -->
			</nav>
		</div>
	  </header>
	<!--/header-->
</section>
<script src="{{url('/frontend/assets/js/jquery-3.3.1.min.js')}}"></script> <!-- Common jquery plugin -->
<!--bootstrap working-->
<script src="{{url('/frontend/assets/js/bootstrap.min.js')}}"></script>
<!--bootstrap working//-->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>


<!--/MENU-JS-->
<script>
	$(window).on("scroll", function () {
	  var scroll = $(window).scrollTop();
  
	  if (scroll >= 80) {
		$("#site-header").addClass("nav-fixed");
	  } else {
		$("#site-header").removeClass("nav-fixed");
	  }
	});
  
	//Main navigation Active Class Add Remove
	$(".navbar-toggler").on("click", function () {
	  $("header").toggleClass("active");
	});
	$(document).on("ready", function () {
	  if ($(window).width() > 991) {
		$("header").removeClass("active");
	  }
	  $(window).on("resize", function () {
		if ($(window).width() > 991) {
		  $("header").removeClass("active");
		}
	  });
	});
  </script>
  <!--//MENU-JS-->
<!-- disable body scroll which navbar is in active -->
<script>
$(function () {
  $('.navbar-toggler').click(function () {
    $('body').toggleClass('noscroll');
  })
});
</script>
<!-- disable body scroll which navbar is in active -->
<!--theme switcher dark and light mode script-->
<script>
	
  </script>
  <!--theme switcher dark and light mode script//-->