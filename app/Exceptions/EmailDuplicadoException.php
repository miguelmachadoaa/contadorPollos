<?php
 
namespace App\Exceptions;
 
use Log;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
 
class EmailDuplicadoException extends Exception
{
    public function __construct(private readonly string $email)
    {
        parent::__construct("El email ". $email ." esta siendo usado por otra cuenta.");
    }

}