<?php

namespace App\Mappers;

use App\Models\Pagos;
use App\Models\ContratoDetalle;
use App\Models\Contrato;
use Illuminate\Database\Eloquent\Collection;

class PagosMapper{

    public function map(?Pagos $pago): ?Pagos
    {

        if($pago){

            if($pago->type == 'cuota'){
                $pago -> detalle = ContratoDetalle::where('id', $pago->type_id)->first();
            }
    
            if($pago->type=='contrato'){
                $pago->contrato= Contrato::where('id', $pago->type_id)->first();
            }

            if($pago->type=='diferencia'){
                $pago->diferencia= Contrato::where('id', $pago->type_id)->first();
            }

        }

        return $pago;

    }

    public function multiMap(?Collection $pagos): ?Collection
    {

        foreach($pagos as $pago){

            if($pago->type == 'cuota'){
                $pago -> detalle = ContratoDetalle::where('id', $pago->type_id)->first();
            }
    
            if($pago->type=='contrato'){
                $pago->contrato= Contrato::where('id', $pago->type_id)->first();
            }

            if($pago->type=='diferencia'){
                $pago->diferencia= Contrato::where('id', $pago->type_id)->first();
            }
        }

        return $pagos;

    }


}