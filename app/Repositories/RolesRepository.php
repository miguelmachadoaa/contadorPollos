<?php

namespace App\Repositories;

use App\Models\Roles;
use Illuminate\Support\Str;
use App\Exceptions\FormularioException;
use App\Exceptions\PasswordException;
use App\Exceptions\EmailDuplicadoException;
use App\Exceptions\NoFoundClienteException;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AuditoriaRepository;


final class RolesRepository{

    public function __construct(
        private readonly Roles $model,
        private readonly AuditoriaRepository $auditoriaRepository,
        )
    {
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findByRol($id)
    {
        return $this->model->where('rol', $id)->get();
    }


    public function validar(array $data)
    {
        foreach ($data as $key => $value) {
            if (empty($value)) {
                if (
                    $key == 'observaciones' || 
                    $key=='estatus' || 
                    $key=='facebook' || 
                    $key=='twitter' || 
                    $key=='instagram' || 
                    $key=='tiktok' ||
                    $key=='archivo' 
                    ) {
                    continue;
                }
                throw new FormularioException($key);
            }
        }

        if(isset($data['password']) && isset($data['repassword'])){
            if($data['password']!=$data['repassword']){
                throw new PasswordException();
            }
        }
    }

    public function create(array $data)
    {

        $this->validar($data);

        if(isset($data['id'])){

            $role = $this->model::find($data['id']);

        }else{

            $role = $this->model::create([
                'nombre' => $data['nombre']??$data['name'],

            ]);

            $this->auditoriaRepository->create([
                'type_id'=>$role->id,
                'type'=>'roles',
                'accion'=>'Se ha creado un rol', 
                'data'=>json_encode($data, true)
            ]);

        }

        return $this->model->find($role->id);
    }

    public function update($id, array $data)
    {
        $this->validar($data);

        $role = $this->model->findOrFail($id);

        $role->update($data);

        $this->auditoriaRepository->create([
            'type_id'=>$role->id,
            'type'=>'roles',
            'accion'=>'Se ha actualizado un roles', 
            'data'=>json_encode($data, true)
        ]);

        return $role;
    }

    public function delete($id)
    {
        $role = $this->model->findOrFail($id);
        $role->delete();

        $this->auditoriaRepository->create([
            'type_id'=>$role->id,
            'type'=>'roles',
            'accion'=>'Se ha eliminado un roles', 
            'data'=>json_encode($id, true)
        ]);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function searchBy(array $data)
    {
        $query = $this->model->select('*');

        foreach($data as $key=>$value){
            $query->where($key, $value);
        }
        
        return $query->get();
    }
}