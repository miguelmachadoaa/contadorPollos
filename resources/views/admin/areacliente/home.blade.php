@extends('layouts.cliente')

@section('content')

  <div class="container-fluid revisar">

    <div class="row">

      <div class="col">

        <div class="card card_border py-2 mb-2">
          <div class="card-body ">

          <h3>Hola, {{$cliente->nombre.' '.$cliente->apellido}}</h3>
          <p style="font-size: 16px"><b>Saldo Disponible: </b>{{$cliente->saldo_cliente}} $</p>
          <p style="font-size: 16px"><b>Monto de Cuota Usd: </b> 
            {{number_format( $contratos->first()->detalles->first()->monto,2)}} $</p>

            <p style="font-size: 16px"><b>Monto de Cuota Bs: </b> 
               {{number_format( $contratos->first()->detalles->first()->monto*$dolar->valor,2)}}  </p>

          @if(count($contratos->where('estatus', 'activo')))
            
            <p style="font-size: 16px"><b>Proxima fecha de Pago: </b> 
              {{  $contratos->where('estatus', '<>', 'desactivado')
                  ->first()->detalles->where('estatus', '<>', '1')
                  ->first()?->fecha
              }}
            </p>

          @else
            <div class="alert alert-danger">
              No posee contratos activos, Si posee un contrato inactivo debe cancelar la primera cuota para activar el contrato
            </div>
          @endif
          

        </div>
      </div>


      </div>
    </div>
    
    <div class="row">

        <div class="col-sm-4 detalleCliente">
          @include('admin.areacliente.detalle-cliente')
          @include('admin.areacliente.archivos')
      </div>
      <div class="col-sm-8">

        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Contratos</button>
            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Abonos</button>
            <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Pagos</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="card card_border py-2 mb-2">
              <div class="cards__heading mb-0 ">
                  <h3>Contratos <span></span></h3>
              </div>
              <div class="card-body p-0 m-0">
  
                  @if(count($cliente->contratos))
  
                    @foreach($cliente->contratos as $contrato)
    
                    <div 
                    class="contratoDetail{{$contrato->id}} {{($contrato->estatus == 'adjudicado')?'bg-adjudicado':''}}"
                    >
                        @include('admin.areacliente.contrato')
    
                    </div>
    
                    @endforeach
  
                  @else
  
                  <div class="row">
                      <div class="col-sm-12">
                          <h3>No posee contratos</h3>
                      </div>
                  </div>
  
                  @endif
                  
              </div>
          </div>

          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="card card_border py-2 mb-2">
              <div class="cards__heading mb-0 ">
                  <h3>Abonos <span></span></h3>
              </div>
              <div class="card-body p-0 m-0">
            @include('admin.abonos.table')
            
          </div>
          </div>
        </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="card card_border py-2 mb-2">
              <div class="cards__heading mb-0 ">
                  <h3>Pagos <span></span></h3>
              </div>
              <div class="card-body p-0 m-0">
            @include('admin.pagos.table')

          </div>
          </div>
        </div>
        </div>
  
  
          
        </div>
        
      </div>
    
  </div>

@endsection
