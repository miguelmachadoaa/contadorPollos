<?php
 
namespace App\Exceptions;
 
use Log;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
 
class GeneralException extends Exception
{

    public function report(): ?bool
    {
        Log::info('Error al validar Fomulario ');
    }
 
    public function render(Request $request): Response
    {
        return response('Todos los campos son requeridos');
    }
}