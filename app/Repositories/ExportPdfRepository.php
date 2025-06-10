<?php

namespace App\Repositories;
use App\Custom\fpdf\fpdf as fpdf;

final class ExportPdfRepository{

    public function contratos(Array $header, Array $data, $titulo = 'Reporte de Contratos')
    {
        
        
        $this->fpdf = new fpdf;

        $this->fpdf->AddPage('L', 'legal');

        $this->fpdf->SetFont('Arial', 'B');

        $this->fpdf->SetFontSize(18);

        $this->fpdf->SetFillColor(255,255,255);
        
        $this->fpdf->cell(100,8,'', 0, 1, 'L', true);
        $this->fpdf->cell(100,8,'', 0, 0, 'L', true);
        $this->fpdf->cell(40,8,utf8_decode($titulo), 0, 1, 'L', true);

        $this->fpdf->Image(url('/assets/images/logo.png') , 20,0,0,40 );

        $this->fpdf->cell(1,8,' ', 0, 1, 'L', true);

        $this->fpdf->SetFontSize(8);

        $medidas=array(
            20,
            20,
            40,
            20,
            10,
            10,
            15,
            35,
            60,
            20,
            10,
            12,
            12,
            20,
            20
        );
       
        $this->fpdf->cell($medidas[0],8,'Nombre', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[1],8,'Apellido', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[2],8,'Email', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[3],8,'Cedula', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[4],8,'Insc.', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[5],8,'Rango', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[6],8,'Estado', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[7],8,'Producto', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[8],8,'Direccion', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[9],8,'Telefono', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[10],8,'Venc.', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[11],8,'Prog.', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[12],8,'Regr.', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[13],8,'Activacion.', 1, 0, 'C', true);
        $this->fpdf->cell($medidas[14],8,'Ultimo Pago.', 1, 1, 'C', true);

        foreach($data as $contrato){

            $alto = 8;

            $lineas =  str_split($contrato['direccion'], 31);

            $i=0;

            if(count($lineas)==1){

                $this->fpdf->cell($medidas[0],$alto,utf8_encode($contrato['nombre']), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[1],$alto,utf8_encode($contrato['apellido']), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[2],$alto,utf8_encode(strtolower($contrato['email'])), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[3],$alto,utf8_encode($contrato['cedula']), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[4],$alto,utf8_encode($contrato['inscripcion']), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[5],$alto,utf8_encode($contrato['monto']), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[6],$alto,utf8_encode($contrato['estatus']), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[7],$alto,utf8_encode($contrato['titulo']), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[8],$alto,utf8_encode($l), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[9],$alto,utf8_encode($contrato['telefono']), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[10],$alto,utf8_encode($contrato['vencidas']), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[11],$alto,utf8_encode($contrato['progresivas']), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[12],$alto,utf8_encode($contrato['regresivas']), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[13],$alto,utf8_encode($contrato['activacion']), 1, 0, 'L', true);
                $this->fpdf->cell($medidas[14],$alto,utf8_encode($contrato['ultimo']), 1, 1, 'L', true);

            }else{


                foreach($lineas as $l){

                    $nombre = explode(' ', $contrato['nombre']);
                    $apellido = explode(' ', $contrato['apellido']);

                    if($i==0){
    
                        $this->fpdf->cell($medidas[0],$alto,utf8_encode($nombre[$i]??''), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[1],$alto,utf8_encode($apellido[$i]??''), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[2],$alto,utf8_encode(strtolower($contrato['email'])), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[3],$alto,utf8_encode($contrato['cedula']), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[4],$alto,utf8_encode($contrato['inscripcion']), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[5],$alto,utf8_encode($contrato['monto']), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[6],$alto,utf8_encode($contrato['estatus']), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[7],$alto,utf8_encode($contrato['titulo']), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[8],$alto,utf8_encode($l), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[9],$alto,utf8_encode($contrato['telefono']), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[10],$alto,utf8_encode($contrato['vencidas']), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[11],$alto,utf8_encode($contrato['progresivas']), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[12],$alto,utf8_encode($contrato['regresivas']), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[13],$alto,utf8_encode($contrato['activacion']), 'LTR', 0, 'L', true);
                        $this->fpdf->cell($medidas[14],$alto,utf8_encode($contrato['ultimo']), 'LTR', 1, 'L', true);
    
                    }else{

                        if($i+1==count($lineas)){

                            $this->fpdf->cell($medidas[0],$alto-3,utf8_encode($nombre[$i]??''), 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[1],$alto-3,utf8_encode($apellido[$i]??''), 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[2],$alto-3,'', 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[3],$alto-3,'', 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[4],$alto-3,'', 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[5],$alto-3,'', 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[6],$alto-3,'', 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[7],$alto-3,'', 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[8],$alto-3,utf8_encode($l), 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[9],$alto-3,'', 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[10],$alto-3,'', 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[11],$alto-3,'', 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[12],$alto-3,'', 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[13],$alto-3,'', 'LBR', 0, 'L', true);
                            $this->fpdf->cell($medidas[14],$alto-3,'', 'LBR', 1, 'L', true);


                        }else{

                            $this->fpdf->cell($medidas[0],$alto-3,utf8_encode($nombre[$i]??''), 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[1],$alto-3,utf8_encode($apellido[$i]??''), 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[2],$alto-3,'', 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[3],$alto-3,'', 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[4],$alto-3,'', 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[5],$alto-3,'', 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[6],$alto-3,'', 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[7],$alto-3,'', 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[8],$alto-3,utf8_encode($l), 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[9],$alto-3,'', 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[10],$alto-3,'', 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[11],$alto-3,'', 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[12],$alto-3,'', 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[13],$alto-3,'', 'LR', 0, 'L', true);
                            $this->fpdf->cell($medidas[14],$alto-3,'', 'LR', 1, 'L', true);

                        }
                       
                    }
    
                    $i++;
    
                }


            }
            

        }


        $this->fpdf->Output('I', 'contrato.pdf');

        exit;


    }


    public function pagos(Array $header, Array $data)
    {
        
        
        $this->fpdf = new fpdf;

        $this->fpdf->AddPage('L', 'legal');

        $this->fpdf->SetFont('Arial', 'B');

        $this->fpdf->SetFontSize(18);

        $this->fpdf->SetFillColor(255,255,255);
        
        $this->fpdf->cell(100,8,'', 0, 1, 'L', true);
        $this->fpdf->cell(100,8,'', 0, 0, 'L', true);
        $this->fpdf->cell(40,8,utf8_decode('Reporte de pagos '), 0, 1, 'L', true);

        $this->fpdf->Image(url('/assets/images/logo.png') , 20,0,0,40 );

        $this->fpdf->cell(1,8,' ', 0, 1, 'L', true);

        $this->fpdf->SetFontSize(12);

        $this->fpdf->SetFont('Arial', 'B');

        $medidas=[15,25,25,60,60,70,30,20,20];

       
        $this->fpdf->cell($medidas[0],8,'ID', 1, 0, 'L', true);
        $this->fpdf->cell($medidas[1],8,'Monto', 1, 0, 'L', true);
        $this->fpdf->cell($medidas[2],8,'Tipo', 1, 0, 'L', true);
        $this->fpdf->cell($medidas[3],8,'Nombre Cliente.', 1, 0, 'L', true);
        $this->fpdf->cell($medidas[4],8,'Apellido Cliente', 1, 0, 'L', true);
        $this->fpdf->cell($medidas[5],8,'Email Cliente', 1, 0, 'L', true);
        $this->fpdf->cell($medidas[6],8,'Inscripcion', 1, 0, 'L', true);
        $this->fpdf->cell($medidas[7],8,'Rango', 1, 0, 'L', true);
        $this->fpdf->cell($medidas[8],8,'Cuota', 1, 1, 'L', true);

        $this->fpdf->SetFont('Arial');


        foreach($data as $contrato){

            $this->fpdf->cell($medidas[0],8,utf8_encode($contrato['id']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[1],8,utf8_encode($contrato['monto']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[2],8,utf8_encode( $contrato['tipo']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[3],8,utf8_encode($contrato['nombre']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[4],8,utf8_encode($contrato['apellido']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[5],8,utf8_encode(strtolower($contrato['email'])), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[6],8,utf8_encode(strtolower($contrato['inscripcion'])), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[7],8,utf8_encode(strtolower($contrato['rango'])), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[8],8,utf8_encode(strtolower($contrato['cuota'])), 1, 1, 'L', true);

        }


        $this->fpdf->Output('I', 'pagos.pdf');

        exit;


    }


    public function abonos(Array $header, Array $data)
    {
        
        
        $this->fpdf = new fpdf;

        $this->fpdf->AddPage('L', 'legal');

        $this->fpdf->SetFont('Arial', 'B');

        $this->fpdf->SetFontSize(18);

        $this->fpdf->SetFillColor(255,255,255);
        
        $this->fpdf->cell(100,8,'', 0, 1, 'L', true);
        $this->fpdf->cell(100,8,'', 0, 0, 'L', true);
        $this->fpdf->cell(40,8,utf8_decode('Reporte de pagos '), 0, 1, 'L', true);

        $this->fpdf->Image(url('/assets/images/logo.png') , 20,0,0,40 );

        $this->fpdf->cell(1,8,' ', 0, 1, 'L', true);

        $this->fpdf->SetFontSize(9);

        $this->fpdf->SetFont('Arial', 'B');

        $medidas = [10,12,12,12,20,40,20,20,45,45,45,20,15,15];

            $this->fpdf->cell($medidas[0],8,'Nro', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[1],8,'Monto', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[2],8,'Monto Bs', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[3],8,'Tasa', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[4],8,'Fecha', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[5],8,'Forma de Pago', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[6],8,'Referencia', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[7],8,'Estado', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[8],8,'Nombre Cliente', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[9],8,'Apellido Cliente', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[10],8,'Email Cliente', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[11],8,'Inscripcion', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[12],8,'Rango', 1, 0, 'L', true);
            $this->fpdf->cell($medidas[13],8,'Cuota', 1, 1, 'L', true);


        $this->fpdf->SetFont('Arial');

        foreach($data as $item){

            $this->fpdf->cell($medidas[0],8,utf8_encode($item['id']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[1],8,utf8_encode($item['monto']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[2],8,utf8_encode( $item['monto_bs']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[3],8,utf8_encode( $item['tasa']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[4],8,utf8_encode( $item['fecha']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[5],8,utf8_encode( $item['forma_pago']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[6],8,utf8_encode( $item['referencia']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[7],8,utf8_encode( $item['estado']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[8],8,utf8_encode( $item['nombre']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[9],8,utf8_encode( $item['apellido']), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[10],8,utf8_encode(strtolower($item['email'])), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[11],8,utf8_encode(strtolower($item['inscripcion'])), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[12],8,utf8_encode(strtolower($item['rango'])), 1, 0, 'L', true);
            $this->fpdf->cell($medidas[13],8,utf8_encode(strtolower($item['cuota'])), 1, 1, 'L', true);

        }


        $this->fpdf->Output('I', 'abonos.pdf');

        exit;


    }


    public function diario(
        Array $header,
        Array $data,
        array $dataPagos,
        array $dataContratos,
        $titulo
        )
    {
        
        
        $this->fpdf = new fpdf;

        $this->fpdf->AddPage('L', 'legal');

        $this->fpdf->SetFont('Arial', 'B');

        $this->fpdf->SetFontSize(18);

        $this->fpdf->SetFillColor(255,255,255);
        
        $this->fpdf->cell(1,8,'', 0, 1, 'L', true);
        $this->fpdf->cell(1,8,'', 0, 1, 'L', true);
        $this->fpdf->cell(335,8,utf8_decode($titulo), 0, 1, 'C', true);

        $this->fpdf->Image(url('/assets/images/logo.png') , 20,0,0,40 );

        $this->fpdf->cell(1,8,' ', 0, 1, 'L', true);

        $this->fpdf->SetFontSize(13);

        $this->fpdf->SetFont('Arial', 'B');


        $this->fpdf->cell(1,8,'', 0, 1, 'L', true);
        $this->fpdf->cell(1,8,'', 0, 0, 'L', true);
        $this->fpdf->cell(335,8,utf8_decode('Listado de Abonos'), 0, 1, 'C', true);
        $this->fpdf->cell(1,8,' ', 0, 1, 'L', true);

        $this->fpdf->SetFontSize(9);


            $this->fpdf->cell(10,8,'Nro', 1, 0, 'L', true);
            $this->fpdf->cell(65,8,'Nombre y apellido', 1, 0, 'L', true);
            $this->fpdf->cell(65,8,'Email Cliente', 1, 0, 'L', true);
            $this->fpdf->cell(35,8,'Cedula Cliente', 1, 0, 'L', true);
            $this->fpdf->cell(35,8,'Telefono', 1, 0, 'L', true);
            $this->fpdf->cell(35,8,'Forma de pago', 1, 0, 'L', true);
            $this->fpdf->cell(15,8,'Tasa', 1, 0, 'L', true);
            $this->fpdf->cell(15,8,'Monto', 1, 0, 'L', true);
            $this->fpdf->cell(35,8,'Referencia', 1, 0, 'L', true);
            $this->fpdf->cell(25,8,'Fecha', 1, 1, 'L', true);



        $this->fpdf->SetFont('Arial');

        foreach($data as $item){

            $this->fpdf->cell(10,8,utf8_encode($item['recibo']), 1, 0, 'L', true);
            $this->fpdf->cell(65,8,utf8_encode($item['nombre']), 1, 0, 'L', true);
            $this->fpdf->cell(65,8,utf8_encode($item['email']), 1, 0, 'L', true);
            $this->fpdf->cell(35,8,utf8_encode($item['cedula']), 1, 0, 'L', true);
            $this->fpdf->cell(35,8,utf8_encode($item['telefono']), 1, 0, 'L', true);
            $this->fpdf->cell(35,8,utf8_encode($item['forma']), 1, 0, 'L', true);
            $this->fpdf->cell(15,8,utf8_encode($item['tasa']), 1, 0, 'L', true);
            $this->fpdf->cell(15,8,utf8_encode($item['monto']), 1, 0, 'L', true);
            $this->fpdf->cell(35,8,utf8_encode($item['referencia']), 1, 0, 'L', true);
            $this->fpdf->cell(25,8,utf8_encode($item['fecha']), 1, 1, 'L', true);

        }


        $this->fpdf->SetFontSize(13);

        $this->fpdf->cell(1,8,'', 0, 1, 'L', true);
        $this->fpdf->cell(1,8,'', 0, 0, 'L', true);
        $this->fpdf->cell(335,8,utf8_decode('Listado de pagos'), 0, 1, 'C', true);
        $this->fpdf->cell(1,8,' ', 0, 1, 'L', true);


        $this->fpdf->SetFontSize(9);

            $this->fpdf->cell(10,8,'Nro', 1, 0, 'L', true);
            $this->fpdf->cell(65,8,'Nombre y apellido', 1, 0, 'L', true);
            $this->fpdf->cell(65,8,'Email Cliente', 1, 0, 'L', true);
            $this->fpdf->cell(35,8,'Cedula Cliente', 1, 0, 'L', true);
            $this->fpdf->cell(35,8,'Telefono', 1, 0, 'L', true);
            $this->fpdf->cell(35,8,'Forma de pago', 1, 0, 'L', true);
            $this->fpdf->cell(15,8,'Tasa', 1, 0, 'L', true);
            $this->fpdf->cell(15,8,'Monto', 1, 0, 'L', true);
            $this->fpdf->cell(35,8,'Referencia', 1, 0, 'L', true);
            $this->fpdf->cell(25,8,'Fecha', 1, 1, 'L', true);



        $this->fpdf->SetFont('Arial');

        foreach($dataPagos as $item){

            $this->fpdf->cell(10,8,utf8_encode($item['recibo']), 1, 0, 'L', true);
            $this->fpdf->cell(65,8,utf8_encode($item['nombre']), 1, 0, 'L', true);
            $this->fpdf->cell(65,8,utf8_encode($item['email']), 1, 0, 'L', true);
            $this->fpdf->cell(35,8,utf8_encode($item['cedula']), 1, 0, 'L', true);
            $this->fpdf->cell(35,8,utf8_encode($item['telefono']), 1, 0, 'L', true);
            $this->fpdf->cell(35,8,utf8_encode($item['forma']), 1, 0, 'L', true);
            $this->fpdf->cell(15,8,utf8_encode($item['tasa']), 1, 0, 'L', true);
            $this->fpdf->cell(15,8,utf8_encode($item['monto']), 1, 0, 'L', true);
            $this->fpdf->cell(35,8,utf8_encode($item['referencia']), 1, 0, 'L', true);
            $this->fpdf->cell(25,8,utf8_encode($item['fecha']), 1, 1, 'L', true);

        }


        $this->fpdf->cell(1,8,' ', 0, 1, 'L', true);
        $this->fpdf->cell(1,8,' ', 0, 1, 'L', true);

        $this->fpdf->SetFontSize(13);

        $this->fpdf->cell(1,8,'', 0, 1, 'L', true);
        $this->fpdf->cell(1,8,'', 0, 0, 'L', true);
        $this->fpdf->cell(335,8,utf8_decode('Listado de Contratos'), 0, 1, 'C', true);
        $this->fpdf->cell(1,8,' ', 0, 1, 'L', true);

        $this->fpdf->SetFontSize(9);


            $this->fpdf->cell(10,8,'Nro', 1, 0, 'L', true);
            $this->fpdf->cell(65,8,'Nombre y apellido', 1, 0, 'L', true);
            $this->fpdf->cell(65,8,'Email Cliente', 1, 0, 'L', true);
            $this->fpdf->cell(35,8,'Cedula Cliente', 1, 0, 'L', true);
            $this->fpdf->cell(35,8,'Telefono', 1, 0, 'L', true);
            $this->fpdf->cell(35,8,'Forma de pago', 1, 0, 'L', true);
            $this->fpdf->cell(15,8,'Tasa', 1, 0, 'L', true);
            $this->fpdf->cell(15,8,'Monto', 1, 0, 'L', true);
            $this->fpdf->cell(35,8,'Referencia', 1, 0, 'L', true);
            $this->fpdf->cell(25,8,'Fecha', 1, 1, 'L', true);


        $this->fpdf->SetFont('Arial');

        foreach($dataContratos as $item){

            $this->fpdf->cell(10,8,utf8_encode($item['recibo']), 1, 0, 'L', true);
            $this->fpdf->cell(65,8,utf8_encode($item['nombre']), 1, 0, 'L', true);
            $this->fpdf->cell(65,8,utf8_encode($item['email']), 1, 0, 'L', true);
            $this->fpdf->cell(35,8,utf8_encode($item['cedula']), 1, 0, 'L', true);
            $this->fpdf->cell(35,8,utf8_encode($item['telefono']), 1, 0, 'L', true);
            $this->fpdf->cell(35,8,utf8_encode($item['forma']), 1, 0, 'L', true);
            $this->fpdf->cell(15,8,utf8_encode($item['tasa']), 1, 0, 'L', true);
            $this->fpdf->cell(15,8,utf8_encode($item['monto']), 1, 0, 'L', true);
            $this->fpdf->cell(35,8,utf8_encode($item['referencia']), 1, 0, 'L', true);
            $this->fpdf->cell(25,8,utf8_encode($item['fecha']), 1, 1, 'L', true);

        }

        $this->fpdf->Output('I', 'reporte diario.pdf');

        exit;


    }
    
}