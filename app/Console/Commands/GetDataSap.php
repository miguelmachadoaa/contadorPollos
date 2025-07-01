<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;
use App\Repositories\SapRepository;
use App\Repositories\AuditoriaRepository;
use Carbon\Carbon;
use DB as DB;

class GetDataSap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-data-sap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(
        private readonly ApiService $apiService,
        private readonly SapRepository $sapRepository,
        private readonly AuditoriaRepository $auditoriaRepository
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $cantidad = DB::connection('odbc')
        ->table('SAPCPR.ZMM_CABROM')
        ->select('*')
        ->where('FECID',  date("20250630"))
        //->where('FECID',  date("Ymd"))
      // ->limit(1)
        ->count();


        if(!$cantidad){
            echo 'No hay tickets para procesar';
            die();
        }


        $tickets = DB::connection('odbc')
        ->table('SAPCPR.ZMM_CABROM')
        ->select('*')
        ->where('FECID',  date("20250630"))
        ///->where('FECID',  date("Ymd"))
      // ->limit(1)
        ->get();



        foreach($tickets as $t){


            echo $t->DOCNR.' / ';

            $t2 = DB::connection('odbc')
            ->table('SAPCPR.ZMM_DETROM')
            ->select('*')
            ->where('DOCNR',  $t->DOCNR)
            ->first();


            $t3 = DB::connection('odbc')
            ->table('SAPCPR.ZCH_PESADA')
            ->select('*')
            ->where('CEDULA',  $t->CODCH)
            ->first();

             $t4 = DB::connection('odbc')
            ->table('SAPCPR.ZPS_MAGRACLI')
            ->select('*')
            ->where('LIFNR',  $t->CODAC)
            ->first();


           // dd($t4);
           // dd($t, $t2, $t3);


            $orden = $this->sapRepository->create([
                'sociedad'=>$t->BUKRS,
                'ejercicio'=>$t->GJAHR,
                'ticket'=>$t->DOCNR,
                'placa'=>$t->PLACA,
                'peso_tara_inicial'=>$t2->TARAP,
                'fecha_tara_inicial'=>$this->formatFecha($t2->FECHP),
                'hora_tara_inicial'=>$t2->HORAP,
                'peso_bruto_planta'=>$t2->BRUTP,
                'prom_neto_planta'=>0,
                'fecha_inicio'=>$this->formatFecha($t2->FECBP),
                'hora_inicio'=>$t2->HORBP,
                'peso_bruto_espera'=>$t2->REPEP,
                'neto_fin_planta'=>$t2->NETOP,
                'fecha_fin_planta'=>$this->formatFecha($t2->FECFP),
                'hora_fin_planta'=>$t2->HORFP,
                'transportista'=>$t->CODTRA,
                'ci_chofer'=>$t->CODCH,
                'chofer'=>$t3->NOMCHOFER,
                'cod_procedencia'=>$t->CODAC,
                'procedencia'=>$t4->NOMPRO,
                'orden_carga'=>$t->NORCA,
                'n_galpon'=>$t->CODGA,
                'jaulas'=>0,
                'aves_por_jaula'=>0,
                'cant_aves'=>0,
                'num_lote'=>$t->NUMLO,
                'aves_contador'=>$t2->AVEREA,
                'aves_muertas'=>$t2->AVEMU,
            //    'aves_muertas_kilos'=>$t2->AVEMK,
                'aves_faltantes'=>$t2->AVEDEC,
                'aves_faltantes_robo'=>$t2->AVEF1U,
                'aves_faltantes_carga'=>$t2->AVEF2U,
                'aves_faltantes_imputable'=>$t2->AVEF3U,
                'aves_faltantes_sistema'=>$t2->AVEF4U,
                'aves_sobre_escaldado_unidad'=>$t2->AVED1U,
                'aves_sobre_escaldado_kilo'=>$t2->AVED1K,
                'aves_defectuosa_unidad'=>$t2->AVED2U,
                'aves_defectuosa_kilo'=>$t2->AVED2K,
                'aves_rojas_unidad'=>$t2->AVED3U,
                'aves_rojas_kilo'=>$t2->AVED3K,
                'aves_caquexicos_unidad'=>$t2->AVED3U,
                'aves_caquexicos_kilo'=>$t2->AVED3K,
                'aves_mutilados_unidad'=>$t2->AVED4U,
                'aves_mutilados_kilo'=>$t2->AVED4K,
                'aves_descartadas'=>$t2->AVEDES,
                'status'=>$t->STATU,
                'proceso'=>'recibido_sap',
            ]);

            if($orden){

                if($orden->proceso=='recibido_sap'){

                     $response =  $this->apiService->setOrder([
                    "ticket"=> $orden->ticket,
                    "placa"=> $orden->placa,
                    "tara_inicial"=> $orden->peso_tara_inicial,
                    "fecha_inicial"=> $orden->fecha_tara_inicial,
                    "hora_inicial"=> $orden->hora_tara_inicial,
                    "bruto_planta"=> $orden->peso_bruto_planta,
                    "neto_planta"=> ($orden->prom_neto_planta==0)?1:$orden->prom_neto_planta,
                    "fecha_planta"=> $orden->fecha_inicio,
                    "hora_planta"=> $orden->hora_inicio,
                    "bruto_espera"=> $orden->peso_bruto_espera,
                    "fecha_espera"=> $orden->fecha_inicio,
                    "hora_espera"=> $orden->hora_inicio,
                    "neto_fin_planta"=> $orden->neto_fin_planta,
                    "fecha_fin_planta"=> $orden->fecha_fin_planta,
                    "hora_fin_planta"=> $orden->hora_fin_planta,
                    "transportista"=> $orden->transportista,
                    "chofer_ci"=> $orden->ci_chofer,
                    "chofer_nombre"=> $orden->chofer,
                    "procedencia_codigo"=> $orden->cod_procedencia,
                    "procedencia_nombre"=> $orden->procedencia,
                    "codigo_orden"=> $orden->orden_carga,
                    "galpon_numero"=> $orden->n_galpon,
                    "cantidad_jaulas"=> ($orden->jaulas==0)?1:$orden->jaulas,
                    "cantidad_aves_jaula"=> ($orden->aves_por_jaula==0)?1:$orden->aves_por_jaula,
                    ]);

                     

                 echo json_encode($response);

              //  dd($response);

                 $orden->update([
                    'proceso'=>'enviado_api']);

                }else{

                    $response =  $this->apiService->setOrder([
                    "ticket"=> $orden->ticket,
                    "placa"=> $orden->placa,
                    "tara_inicial"=> $orden->peso_tara_inicial,
                    "fecha_inicial"=> $orden->fecha_tara_inicial,
                    "hora_inicial"=> $orden->hora_tara_inicial,
                    "bruto_planta"=> $orden->peso_bruto_planta,
                    "neto_planta"=> ($orden->prom_neto_planta==0)?1:$orden->prom_neto_planta,
                    "fecha_planta"=> $orden->fecha_inicio,
                    "hora_planta"=> $orden->hora_inicio,
                    "bruto_espera"=> $orden->peso_bruto_espera,
                    "fecha_espera"=> $orden->fecha_inicio,
                    "hora_espera"=> $orden->hora_inicio,
                    "neto_fin_planta"=> $orden->neto_fin_planta,
                    "fecha_fin_planta"=> $orden->fecha_fin_planta,
                    "hora_fin_planta"=> $orden->hora_fin_planta,
                    "transportista"=> $orden->transportista,
                    "chofer_ci"=> $orden->ci_chofer,
                    "chofer_nombre"=> $orden->chofer,
                    "procedencia_codigo"=> $orden->cod_procedencia,
                    "procedencia_nombre"=> $orden->procedencia,
                    "codigo_orden"=> $orden->orden_carga,
                    "galpon_numero"=> $orden->n_galpon,
                    "cantidad_jaulas"=> ($orden->jaulas==0)?1:$orden->jaulas,
                    "cantidad_aves_jaula"=> ($orden->aves_por_jaula==0)?1:$orden->aves_por_jaula,
                    ]);
                    echo 'Orden ya registrada en api | ';
                }

                 

            }

        }


    }

    public function formatFecha($fecha){

        if($fecha == '00000000'  || $fecha == null){
            return date('Y-m-d');
        }
        return Carbon::createFromFormat('Ymd', $fecha)->format('Y-m-d');


    }

    public function formatFechaApi($fecha){

        if($fecha == '00000000'  || $fecha == null){
            return date('Y-m-d');
        }
        return $fecha;


    }
}


