
@include('partials.header')



<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact">
        <div class="breadcrumbs-sub">
            <ul class="breadcrumbs-custom-path">
                <li class="right-side propClone"><a href="{{{url('/')}}}" class="editContent">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
                <li class="active editContent">
                    {{ __('main.contacto') }}</li>
            </ul>
            </div>
</div>
</div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	editContent">
        <div class="container">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    

            <div class="d-grid contact-view">

                <div class="cont-details">
                    <h3 class="sub-title">{{ __('main.informacionDeContacto') }}</h3> 
                    <div class="cont-top">
                        <div class="cont-left text-center">
                            <span class="fa fa-phone text-secondary"></span>
                        </div>
                        <div class="cont-right">
                            <p class="para"><a href="tel:{{$configuracion->telefono??null}}">{{$configuracion->telefono??null}}</a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-envelope-o text-secondary"></span>
                        </div>
                        <div class="cont-right">
                            <p class="para"><a href="mailto:{{$configuracion->email??null}}" class="mail">   {{$configuracion->email??null}}</a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-map-marker text-secondary"></span>
                        </div>
                        <div class="cont-right">
                            <p class="para"> {{$configuracion->direccion??null}}.</p>
                        </div>
                    </div>
                </div>
                
                <div class="map-iframe ">
                     <form action="{{url('/sendemail')}}" method="post">
                        <div class="twice-two">
                            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('main.nombre') }}* " required="">
                            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="{{ __('main.apellido') }}* " required="">
                            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="{{ __('main.telefono') }}" >
                            <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('main.email') }}*" required="">
                            <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="{{ __('main.ciudad') }}*"  >
                            <input type="text" class="form-control" name="pais" id="pais" placeholder="{{ __('main.pais') }}*"  >
                           
                        </div>
                        <textarea name="w3lMessage" class="form-control" id="w3lMessage" placeholder="{{ __('main.comentarios') }}" required=""></textarea>

                        <div class="text-right">
                            <button type="submit" class="btn btn-contact">{{__('main.enviarMensaje') }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
       
@include('partials.footer')