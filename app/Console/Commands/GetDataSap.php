<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\SapRepository;
use Carbon\Carbon;
use DB;

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
        private readonly SapRepository $sapRepository
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tickets = DB::connection('odbc')
        ->table('SAPCPR.ZMM_CABROM')
        ->select('*')
      //  ->where('FECFD',  date("Ymd"))
      //  ->orWhere('FECFD',  date("Ymd",strtotime('-1 day')))
      //  ->orWhere('FECFD',  date("Ymd",strtotime('-2 day')))
       //->limit(1)
        ->get();

        foreach($tickets as $t){


            echo $t->DOCNR.' / ';

            $t2 = DB::connection('odbc')
            ->table('SAPCPR.ZMM_DETROM')
            ->select('*')
            ->where('DOCNR',  $t->DOCNR)
            ->first();

            dd($t2);

            $this->sapRepository->create([
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
                'chofer'=>' ',
                'cod_procedencia'=>$t->CODAC,
                'procedencia'=>' ',
                'orden_carga'=>$t->NORCA,
                'n_galpon'=>$t->CODGA,
                'jaulas'=>0,
                'aves_por_jaula'=>0,
                'cant_aves'=>0,
                'num_lote'=>$t->NUMLO,
                'aves_muertas'=>$t2->AVEMU,
                'aves_faltantes'=>$t2->AVEDEC,
                'aves_descartadas'=>$t2->AVEDES,
                'aves_contador'=>0
            ]);

        }


    }

    public function formatFecha($fecha){

        if($fecha == '00000000'){
            return null;
        }
        return Carbon::createFromFormat('Ymd', $fecha)->format('Y-m-d');


    }
}


