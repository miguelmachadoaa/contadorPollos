<?php

namespace App\Repositories;

use App\Models\Auditoria;
use App\Exceptions\FormularioException;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

final class AuditoriaRepository{


    public function __construct(
        private readonly Auditoria $model,
    )
    {
    }

    public function validar(array $data)
    {
        foreach ($data as $key => $value) {
            if (empty($value)) {
                if ($key == 'observaciones') {
                    continue;
                }
                throw new FormularioException($key);
            }
        }
    }

    public function find($id)
    {
        return $this->model->with('usuario')->find($id);
    }

    public function create(array $data)
    {

        $this->validar($data);

        $this->model->create([
            'user_id'=>Auth::user()?Auth::user()->id:0,
            'fecha'=>now(),
            'type'=>$data['type'],
            'type_id'=>$data['type_id'],
            'accion'=>$data['accion'],
            'data'=>$data['data'],
            'cliente_id'=>$data['cliente_id']??null,
        ]);

        return true;
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