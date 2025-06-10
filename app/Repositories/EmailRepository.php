<?php

namespace App\Repositories;

use App\Exceptions\FormularioException;
use App\Mail\ClientePayment;
use App\Mail\ClientAbono;
use App\Mail\ClientCuotaVencida;
use App\Mail\ContratoRegistro;
use App\Mail\Contacto;
use App\Repositories\UserRepository;
use Mail;


final class EmailRepository{

    public function __construct(
        private readonly Mail $mail,
        private readonly UserRepository $userRepository,
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

    public function contacto($contacto)
    {
        try {

            $users = $this->userRepository->findByRol(1);

            $this->mail::to(strtolower($contacto->email))->send(new Contacto(
                $contacto
            ));

            foreach($users as $user){

                $this->mail::to(strtolower($user->email))->send(new Contacto(
                    $contacto
                ));
    
            }
           
        } catch (\Throwable $th) {
            //throw $th;
        }

        return true;
    }

    public function payment($pago)
    {
        try {

            $this->mail::to(strtolower($pago->cliente->email))->send(new ClientePayment(
                $pago
            ));

            $users = $this->userRepository->findByRol(1);

            foreach($users as $user){

                $this->mail::to(strtolower($user->email))->send(new ClientePayment(
                    $pago
                ));
            }


        } catch (\Throwable $th) {
            //throw $th;
        }

        return true;
    }


    public function abono($abono)
    {
        try {

            $users = $this->userRepository->findByRol(1);
            $this->mail::to(strtolower($abono->cliente->email))->send(new ClientAbono(
                $abono
            ));

            foreach($users as $user){

                $this->mail::to(strtolower($user->email))->send(new ClientAbono(
                    $abono
                ));
    
            }
           
        } catch (\Throwable $th) {
            //throw $th;
        }

        return true;
    }

    public function welcome($contrato)
    {
        try {

           $this->mail::to(strtolower($contrato->cliente->email))->send(new ContratoRegistro(
                $contrato
            ));
            
        } catch (\Throwable $th) {
            //throw $th;
        }

        return true;
    }



    public function contrato($contrato)
    {
        try {


           $this->mail::to(strtolower($contrato->cliente->email))->send(new ContratoRegistro(
                $contrato
            ));


            $users = $this->userRepository->findByRol(1);

            foreach($users as $user){

                $this->mail::to(strtolower($user->email))->send(new ContratoRegistro(
                    $contrato
                ));
    
            }
            
        } catch (\Throwable $th) {
            //throw $th;
        }

        return true;
    }


    public function vencida($detalle, $contrato)
    {

        try {

           $this->mail::to(strtolower($contrato->cliente->email))->send(new ClientCuotaVencida(
                $detalle, $contrato
            ));

            $this->mail::to('miguelmachadoaa@gmail.com')->send(new ClientCuotaVencida(
                $detalle, $contrato
            ));

            $users = $this->userRepository->findByRol(1);

            $emails = [];

            foreach($users as $user){
                $emails[]= strtolower($user->email);

                $this->mail::to(strtolower($user->email))->send(new ClientCuotaVencida(
                    $detalle, $contrato
                ));
            }

            $listEmail = implode(', ', $emails);
            
        } catch (\Throwable $th) {
           // dd($th);
        }

        return true;
    }

}
