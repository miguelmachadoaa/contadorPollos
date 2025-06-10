<?php
 
namespace App\Exceptions;
 
use Log;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
 
class FormularioException extends Exception
{
    public function __construct(private readonly string $campo)
    {
        parent::__construct("El campo $this->campo es requerido");
    }

}