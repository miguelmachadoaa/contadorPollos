<?php
 
namespace App\Exceptions;
 
use Log;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
 
class MensajeException extends Exception
{
    public function __construct(private readonly string $mensaje)
    {
        parent::__construct($mensaje);
    }

}