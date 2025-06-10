<?php

namespace App\Mappers;

use App\Models\Pagos;
use App\Models\ContratoDetalle;
use App\Models\Contrato;

class ContratosMapper{

    public function getData($contratos): ?array
    {

        $data = [];

        foreach($contratos as $contrato){

            if($contrato === null){
                continue;
            }

            $pago= Pagos::where(['cliente_id'=>$contrato->cliente->id])->get();

            $ultimo_pago = $pago->sortByDesc('fecha')->first()?->fecha;

            if($contrato === null){
                continue;
            }

            $pagadas = $contrato->detalles->where('estatus', '1')->where('color', 'orange')->count();

            $data[]=[
                'nombre'=>$contrato->cliente->nombre,
                'apellido'=>$contrato->cliente->apellido,
                'email'=>$contrato->cliente->email,
                'cedula'=>$contrato->cliente->tipo_documento.'-'.$contrato->cliente->documento,
                'inscripcion'=>$contrato->inscripcion,
                'monto'=>$contrato->monto,
                'estatus'=>$contrato->estatus,
                'titulo'=>$contrato->producto->titulo,
                'marca'=>$contrato->producto->marca,
                'descripcion'=>$contrato->descripcion,
                'direccion'=>$contrato->cliente->direcciones->first()?->Completa,
                'telefono'=>$contrato->cliente->direcciones->first()?->telefono,
                'name'=>$contrato->vendedor->name,
                'vencidas'=>$contrato->detalles->where('estatus', '2')->count(),
                'progresivas'=>$contrato->detalles->where('estatus', '1')->where('color', '<>', 'orange')->count(),
                'regresivas'=>$contrato->detalles->where('estatus', '1')->where('color', 'orange')->count(),
                'activacion'=>$contrato->detalles->where('cuota', '1')->first()->fecha,
                'ultimo'=>$ultimo_pago,
                'estado'=>($contrato->detalles->where('estatus', '2')->count())?'Moroso':'Normal',
            ];
           
        }

        return $data;

    }
}