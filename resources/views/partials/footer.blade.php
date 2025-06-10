
<!-- a href="https://wa.me/{{$configuracion->whatsapp??null}}?text=Quisiera%20mas%20informacion%20de" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a -->
<section class="w3l-footer-29-main">
	<div class="footer-29 py-5 ">
	  <div class="container">
		<div class="grid-col-3 footer-top-29">
			<div class="footer-list-29 footer-1">
				<h2 class="footer-title-29">{{ __('main.informacionDeContacto') }} </h2>
				<ul>
					<li><p><span class="fa fa-map-marker"></span>{{$configuracion->direccion??null}}</p></li>
					<li><a href="tel:+7-800-999-800"><span class="fa fa-phone"></span> {{$configuracion->telefono??null}}</a></li>
					<li><a href="mailto:{{$configuracion->email??null}}" class="mail"><span class="fa fa-envelope-open-o"></span>  {{$configuracion->email??null}}</a></li>
				</ul>
				<div class="main-social-footer-29">
					<a target="_blank" href="https://www.instagram.com/migtours/" class="instagram"><span class="fa fa-instagram"></span></a>
				</div>
			</div>
			
			<div class="footer-list-29 footer-3">
				<div class="properties">
					<img src="{{url('images/logo_blanco.webp')}}" alt="Migtours">
					<p class="sub-paragraph mt-2 mb-2">{{ __('main.quienesSomos') }}</p>
					<img src="{{url('images/asta.webp')}}" alt="Migtours">
					
			</div>
			</div>
			<div class="footer-list-29 footer-4">
				<div class="row">
					<div class="col">
						{!! $configuracion->videofooter !!}
					</div>
					<!--video width="320" height="240" controls>
						<source src="{{url('images/Final-Comp.mp4')}}" type="video/mp4">
					</video -->
				</div>
			</div>
		</div>
		
	</div>
  </section>

<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
	<span class="fa fa-chevron-up"></span>
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

	if( $('.popup-btn').length){
		$(document).ready(function() {
			var popup_btn = $('.popup-btn');
			popup_btn.magnificPopup({
				type : 'image',
				gallery : {
					enabled : true
				}
			});
		});
	}

	

</script>
<!-- /move top -->

</body>

</html>
