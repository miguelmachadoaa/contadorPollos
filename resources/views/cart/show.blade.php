@include('partials.header')

        <div class="head-bread">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Men</a></li>
                    <li class="active">Shop</li>
                </ol>
            </div>
        </div>
        <div class="showcase-grid">
            <div class="container">



                    <div class="col-md-3 cart-total">
                        <a class="continue keychainify-checked" href="#">Continue su compra</a>
                        <div class="price-details">
                            <h3>Detalle de Compra</h3>
                            <span>Total</span>
                            <span class="total1">{{$cart['total']}}</span>
                            <span>Discount</span>
                            <span class="total1">10%(Festival Offer)</span>
                            <span>Envio</span>
                            <span class="total1">0</span>
                            <div class="clearfix"></div>
                        </div>
                        <hr class="featurette-divider">
                        <ul class="total_price">
                            <li class="last_price"> <h4>TOTAL</h4></li>
                            <li class="last_price"><span>{{$cart['total']}}</span></li>
                            <div class="clearfix"> </div>
                        </ul>
                        <div class="clearfix"></div>
                        <a class="order keychainify-checked" href="#">paghar</a>
                    </div>
                    <div class="col-md-9 cart-items">
                        <h1>Mis Articulos ({{$cart['cantidad']}})</h1>

                        @foreach($cart['productos'] as $producto)
                            
                            <div class="cart-header">
                                <div class="close1">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                                    </span>
                                </div>
                                <div class="cart-sec simpleCart_shelfItem">
                                    <div class="cart-item cyc">
                                        <img src="images/grid8.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="cart-item-info">
                                        <ul class="qty">
                                            <li><p>Size : 9 US</p></li>
                                            <li><p>Qty : {{$producto['cantidad']}}</p></li>
                                            <li><p>Price each : ${{$producto['precio']}}</p></li>
                                        </ul>
                                        <div class="delivery">
                                                <p>Service Charges : 0</p>
                                                <span>Delivered in 2-3 bussiness days</span>
                                                <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>

                        @endforeach
                            
                            
                    </div>
                    <div class="clearfix"> </div>
                
                
            </div>
        </div>
        
      
        


@include('partials.footer')