<?php

namespace App\Repositories;

use App\Models\Notificaciones;
use App\Exceptions\FormularioException;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
final class NotificacionRepository{

    protected $options;
    protected $pusher;

    public function __construct(
        private readonly Notificaciones $model,
        private readonly UserRepository $userRepository,
    )
    {

       $this->options = array(
            'cluster' => 'us2',
            'encrypted' => true
            );

            try {
                $this->pusher = new Pusher(
                    '15e4d0d521d176a02c00', //PUSHER_APP_KEY
                    '8f6d37c7301fac46a48f', //PUSHER_APP_SECRET
                    '1747553', //PUSHER_APP_ID
                    $this->options
                );
            } catch (\Throwable $th) {
               $this->pusher = null;
            }

         
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

        $users = $this->userRepository->findByRol(1);

        foreach($users as $user){

            $this->model->create([
                'user_id'=>$user->id,
                'type_id'=>$data['type_id'],
                'type'=>$data['type'],
                'title'=>$data['title'],
                'body'=>$data['body'],
            ]);
        }

        if($this->pusher !== null){
            $this->pusher->trigger('my-channel', 'my-event', []);
        }

        
       
        return true;
    }

    public function update($id, array $data)
    {
        $this->validar($data);
        
        $notificaion = $this->model->findOrFail($id);

        $notificaion->update($data);

        return $notificaion;
    }

    public function all()
    {
        return $this->model->with('usuario')->where('user_id', Auth::user()->id)->get();
    }

    public function getByUser($id)
    {
        return $this->model->with('usuario')->where('user_id', $id)->where('read', '0')->limit(10)->get();
    }

    public function list()
    {
        return $this->model->with('usuario')->where('user_id', Auth::user()->id)->where('read', '0')->get();
    }


}