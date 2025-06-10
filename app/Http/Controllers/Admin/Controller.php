<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function generaImagenes($texto)
    {

      if(strpos($texto, 'data:image/jpeg;base64,')){

        $pos = strpos($texto, 'data:image/jpeg;base64,');


        $posb=$pos+23;

        $comillas_inicio = strpos($texto, '"', $posb);

        $comillas_fin = strpos($texto, '"', $comillas_inicio);

        $cadena=substr($texto, $posb, $comillas_inicio-$posb);

        $data = base64_decode($cadena);

        $destinationPath = public_path('uploads/descripcion/');

        $archivo = uniqid() . '.jpg';

        $file = $destinationPath .$archivo;

        $dir_archivo=url('uploads/descripcion/'.$archivo);

        $success = file_put_contents($file, $data);

        $resultado=str_replace('data:image/jpeg;base64,'.$cadena, $dir_archivo, $texto);

        $res=$this->generaImagenes($resultado);




      }elseif(strpos($texto, 'data:image/png;base64,')){

          $pos = strpos($texto, 'data:image/png;base64,');

          $posb=$pos+22;

          $comillas_inicio = strpos($texto, '"', $posb);

          $comillas_fin = strpos($texto, '"', $comillas_inicio);

          $cadena=substr($texto, $posb, $comillas_inicio-$posb);

          $data = base64_decode($cadena);

          $destinationPath = public_path('uploads/descripcion/');

          $archivo = uniqid() . '.jpg';

          $file = $destinationPath .$archivo;

          $dir_archivo=url('uploads/descripcion/'.$archivo);

          $success = file_put_contents($file, $data);

          $resultado=str_replace('data:image/png;base64,'.$cadena, $dir_archivo, $texto);

          $res=$this->generaImagenes($resultado);

      }else{

        $res=$texto;

      }

        return $res;

    }

    
}
