<?php

namespace App\Mappers;

use App\Models\Pagos;
use App\Models\ContratoDetalle;
use App\Models\Contrato;
use App\Models\Clientes;
use Illuminate\Database\Eloquent\Collection;

class CuotasMapper{

    public function map(?ContratoDetalle $cuota): ?ContratoDetalle
    {

        if($cuota){

            $cuota->contrato =  Contrato::where('id', $cuota->contrato_id)->first();
            $cuota -> cliente = Clientes::with('direcciones')->where('id', $cuota->contrato->cliente_id)->first();
        }

        return $cuota;

    }

    public function multiMap(?Collection $cuotas): ?Collection
    {

        foreach($cuotas as $cuota){

            if($cuota){

                $cuota->contrato =  Contrato::where('id', $cuota->contrato_id)->first();
                $cuota ->cliente = Clientes::with('direcciones')->where('id', $cuota->contrato->cliente_id)->first();
            }
        }

        return $cuotas;

    }


}