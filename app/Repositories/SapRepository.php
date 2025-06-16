<?php

namespace App\Repositories;

use App\Models\SapRecord;
use App\Exceptions\FormularioException;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

final class SapRepository{


    public function __construct(
        private readonly SapRecord $model,
    )
    {
    }
   

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function saveFromApi($data){
        $ticket = $this->model->where('ticket', $data['ticket'])->first();

        if($ticket){
            $this->updateFromApi($data, $ticket);

        }else{
            $this->createFromApi($data);

        }
    }

    public function createFromApi(array $data)
    {

        $this->model->create([
            'sociedad'=>$data['sociedad'],
            'ejercicio'=>$data['ejercicio'],
            'ticket'=>$data['ticket'],
            'placa'=>$data['placa'],
            'peso_tara_inicial'=>$data['tara_inicial'],
            'fecha_tara_inicial'=>$data['fecha_inicial'],
            'hora_tara_inicial'=>$data['hora_inicial'],
            'peso_bruto_planta'=>$data['bruto_planta'],
            'prom_neto_planta'=>$data['neto_planta'],
            'fecha_inicio'=>$data['fecha_inicial'],
            'hora_inicio'=>$data['hora_inicial'],
            'peso_bruto_espera'=>$data['bruto_espera'],
            'neto_fin_planta'=>$data['neto_fin_planta'],
            'fecha_fin_planta'=>$data['fecha_fin_planta'],
            'hora_fin_planta'=>$data['hora_fin_planta'],
            'transportista'=>$data['transportista'],
            'ci_chofer'=>$data['chofer_ci'],
            'chofer'=>$data['chofer_nombre'],
            'cod_procedencia'=>$data['procedencia_codigo'],
            'procedencia'=>$data['procedencia_nombre'],
            'orden_carga'=>$data['codigo_orden'],
            'n_galpon'=>$data['galpon_numero'],
            'jaulas'=>$data['cantidad_jaulas'],
            'aves_por_jaula'=>$data['cantidad_aves_jaula'],
            'cant_aves'=>$data['suma'],
            'num_lote'=>$data['lote_numero'],
            'aves_muertas'=>$data['aves_muertas'],
            'aves_faltantes'=>$data['aves_faltantes'],
            'aves_descartadas'=>$data['aves_descartadas'],
            'aves_contador'=>$data['aves_contador']??0,
        ]);

        return true;
    }

    public function create(array $data)
    {
        $ticket = $this->model->where('ticket', $data['ticket'])->first();

        if($ticket){
            $this->model->update($data, $ticket);

        }else{
            $this->model->create($data);

        }

        return true;
    }

     public function updateFromApi(array $data, $ticket){

        if(isset($data['aves_contador'])){
            $ticket->update(['aves_contador'=>$data['aves_contador']]);
        }

        return $ticket->update([
            'sociedad'=>$data['sociedad'],
            'ejercicio'=>$data['ejercicio'],
            'ticket'=>$data['ticket'],
            'placa'=>$data['placa'],
            'peso_tara_inicial'=>$data['tara_inicial'],
            'fecha_tara_inicial'=>$data['fecha_inicial'],
            'hora_tara_inicial'=>$data['hora_inicial'],
            'peso_bruto_planta'=>$data['bruto_planta'],
            'prom_neto_planta'=>$data['neto_planta'],
            'fecha_inicio'=>$data['fecha_inicial'],
            'hora_inicio'=>$data['hora_inicial'],
            'peso_bruto_espera'=>$data['bruto_espera'],
            'neto_fin_planta'=>$data['neto_fin_planta'],
            'fecha_fin_planta'=>$data['fecha_fin_planta'],
            'hora_fin_planta'=>$data['hora_fin_planta'],
            'transportista'=>$data['transportista'],
            'ci_chofer'=>$data['chofer_ci'],
            'chofer'=>$data['chofer_nombre'],
            'cod_procedencia'=>$data['procedencia_codigo'],
            'procedencia'=>$data['procedencia_nombre'],
            'orden_carga'=>$data['codigo_orden'],
            'n_galpon'=>$data['galpon_numero'],
            'jaulas'=>$data['cantidad_jaulas'],
            'aves_por_jaula'=>$data['cantidad_aves_jaula'],
            'cant_aves'=>$data['suma'],
            'num_lote'=>$data['lote_numero'],
            'aves_muertas'=>$data['aves_muertas'],
            'aves_faltantes'=>$data['aves_faltantes'],
            'aves_descartadas'=>$data['aves_descartadas']
        ]);


    }

    //funcion update del reporitorio 

    public function update(array $data, $id){

        $auditoria = $this->model->with('usuario')->find($id);

        return $auditoria->update($data);


    }


    public function all()
    {   
        return $this->model->with('usuario')->where('user_id', Auth::user()->id)->get();
    }

    public function getByUser($id)
    {
        return $this->model->with('usuario')->where('user_id', $id)->get();
    }

    public function list()
    {
        return $this->model->with('usuario')->where('user_id', Auth::user()->id)->get();
    }

    public function delete($id)
    {
        $auditoria = $this->model->findOrFail($id);
        return  $auditoria->delete();
        
    }


}