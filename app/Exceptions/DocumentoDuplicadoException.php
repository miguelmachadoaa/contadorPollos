<?php
 
namespace App\Exceptions;
 
use Log;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
 
class DocumentoDuplicadoException extends Exception
{
    public function __construct(private readonly string $documento)
    {
        parent::__construct("El documento ". $documento ." esta siendo usado por otra cuenta.");
    }

}