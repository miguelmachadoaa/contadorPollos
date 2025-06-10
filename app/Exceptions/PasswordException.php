<?php
 
namespace App\Exceptions;
 
use Log;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
 
class PasswordException extends Exception
{
    public function __construct()
    {
        parent::__construct("El campo password y Repassword deben ser iguales.");
    }

}