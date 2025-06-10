<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-bell-o"></i>
        <span class="badge blue badge-notificaciones">{{count($notificaciones)}}</span>
        
    </a>
    <ul class="dropdown-menu "  style="max-height: 25em; overflow: scroll;">

        <li>
            <div class="notification_header">
              <h3>Tienes {{count($notificaciones)}} Notificaciones </h3>

            </div>
          </li>
        
          @foreach($notificaciones as $notificacion)
        
            <li>
                @if($notificacion->type =="abono")
                    <a  
                    href="{{route('admin.abonos.detail', $notificacion->type_id)}}" 
                    class="grid updateNotificacion" data-id="{{$notificacion->id}}">
                @elseif($notificacion->type =="cliente")
                    <a href="{{route('admin.clientes.detail', $notificacion->type_id)}}" class="grid updateNotificacion" data-id="{{$notificacion->id}}">
                @elseif($notificacion->type =="contrato")
                    <a href="{{route('admin.clientes.detail', $notificacion->type_id)}}" class="grid updateNotificacion" data-id="{{$notificacion->id}}">
                @elseif($notificacion->type =="pago")
                    <a target="_blank" href="{{route('admin.pagos.archivo', $notificacion->type_id)}}" class="grid updateNotificacion" data-id="{{$notificacion->id}}">
                @else
                    <a href="#" class="grid updateNotificacion" data-id="{{$notificacion->id}}">
                @endif
                <div class="user_img">

                    @if($notificacion->type =="abono")
                        <img src="https://ui-avatars.com/api/?name=Abono&background=0D8ABC&color=fff&size=128" alt="">
                    @elseif($notificacion->type =="cliente")
                        <img src="https://ui-avatars.com/api/?name=Cliente&background=0D8ABC&color=fff&size=128" alt="">
                    @elseif($notificacion->type =="contrato")
                        <img src="https://ui-avatars.com/api/?name=Contrato&background=0D8ABC&color=fff&size=128" alt="">
                    @else
                        <img src="https://ui-avatars.com/api/?name=Pago&background=0D8ABC&color=fff&size=128" alt="">
                    @endif
                </div>
                <div class="notification_desc">
                    <p>{{$notificacion->title}}</p>
                    <span>{{$notificacion->created_at}}</span>
                </div>
                </a>
            </li>
        
          @endforeach
          
          
          <li>
            <div class="notification_bottom">
              <a href="{{url('admin/notificaciones')}}" class="bg-primary ">Ver Todas</a>
            </div>
          </li>
      
    </ul>
  </li>
    
    
    
    
    
    