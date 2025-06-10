<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Exceptions\FormularioException;
use App\Exceptions\PasswordException;
use App\Exceptions\EmailDuplicadoException;
use App\Exceptions\NoFoundClienteException;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AuditoriaRepository;


final class UserRepository{

    public function __construct(
        private readonly User $model,
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

            $user = $this->model::find($data['id']);

        }else{

            $user = $this->model::create([
                'name' => $data['nombre']??$data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['repassword']),
                'rol' => $data['rol']??4,
                'token'=>md5($data['email'].$data['repassword'])

            ]);

            $this->auditoriaRepository->create([
                'type_id'=>$user->id,
                'type'=>'usuario',
                'accion'=>'Se ha creado un usuario', 
                'data'=>json_encode($data, true)
            ]);

        }

        return $this->model->find($user->id);
    }

    public function update($id, array $data)
    {
        $this->validar($data);

        $user = $this->model->findOrFail($id);

        $user->update($data);

        $this->auditoriaRepository->create([
            'type_id'=>$user->id,
            'type'=>'usuario',
            'accion'=>'Se ha actualizado un usuario', 
            'data'=>json_encode($data, true)
        ]);

        return $user;
    }

    public function delete($id)
    {
        $user = $this->model->findOrFail($id);
        $user->delete();

        $this->auditoriaRepository->create([
            'type_id'=>$saldo->id,
            'type'=>'usuario',
            'accion'=>'Se ha eliminado un usuario', 
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

    public function getAsesores()
    {
        $query = $this->model->where('rol', '<>', '4');
        
        return $query->get();
    }

}