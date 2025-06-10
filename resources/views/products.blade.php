@include('partials.header')

        <div class="head-bread">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">PRODUCTS</li>
                </ol>
            </div>
        </div>
        <div class="products-gallery">
           <div class="container">
               <div class="col-md-9 grid-gallery">
				
                    @include('partials.productoslist')
                   
                    <div class="clearfix"></div>
                </div>

               <div class="col-md-3 grid-details">
                    <div class="grid-addon">
                        <section  class="sky-form">
					 <div class="product_right">
						 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
						 <div class="tab1">
							 <ul class="place">
								 <li class="sort">Shoes</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">
									<a href="{{url('products')}}"><p>Running</p></a>
									<a href="{{url('products')}}"><p>Foot ball</p></a>
									<a href="{{url('products')}}"><p>Daily</p></a>
									<a href="{{url('products')}}"><p>Sneakers</p></a>
						     </div>
					      </div>
						  <div class="tab2">
							 <ul class="place">
								 <li class="sort">Clothing</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">
									<a href="{{url('products')}}"><p>Tracks</p></a>
									<a href="{{url('products')}}"><p>Tees</p></a>
									<a href="{{url('products')}}"><p>Hair bands</p></a>
									<a href="{{url('products')}}"><p>Wrist bands</p></a>
						     </div>
					      </div>
						  <div class="tab3">
							 <ul class="place">
								 <li class="sort">Gear</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">
									<a href="{{url('products')}}"><p>Running app</p></a>
									<a href="{{url('products')}}"><p>Training club</p></a>
									<a href="{{url('products')}}"><p>Nike Fuel+Band se</p></a>
						     </div>
					      </div>
						  <!--script-->
						<script>
							$(document).ready(function(){
								$(".tab1 .single-bottom").hide();
								$(".tab2 .single-bottom").hide();
								$(".tab3 .single-bottom").hide();
								$(".tab4 .single-bottom").hide();
								$(".tab5 .single-bottom").hide();
								
								$(".tab1 ul").click(function(){
									$(".tab1 .single-bottom").slideToggle(300);
									$(".tab2 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab2 ul").click(function(){
									$(".tab2 .single-bottom").slideToggle(300);
									$(".tab1 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab3 ul").click(function(){
									$(".tab3 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
								$(".tab4 ul").click(function(){
									$(".tab4 .single-bottom").slideToggle(300);
									$(".tab5 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
								$(".tab5 ul").click(function(){
									$(".tab5 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
							});
						</script>
						<!-- script -->
				 </section>
			 
				   <!---->
					 <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
					<script type='text/javascript'>//<![CDATA[
					$(window).load(function(){
					 $( "#slider-range" ).slider({
								range: true,
								min: 0,
								max: 400000,
								values: [ 2500, 350000 ],
								slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
								}
					 });
					$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

					});//]]>

					</script>
				
                    </div>
               </div>
            <div class="clearfix"></div>
            </div>
        </div>
        @include('partials.footer')