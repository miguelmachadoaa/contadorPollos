<?php
 
namespace App\Exceptions;
 
use Log;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
 
class NoFoundClienteException extends Exception
{
    public function __construct(private readonly int $id)
    {
        parent::__construct("No se encontro Cliente con el ID ".$id);
    }

}