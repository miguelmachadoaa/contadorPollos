<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\SapRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UpdateDataSap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-data-sap';

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
       
       $tickets = $this->sapRepository->searchBy(['proceso'=>'descarte_cerrado']);
      # $tickets = $this->sapRepository->searchBy(['proceso'=>'update_sap']);

      // dd($tickets);

       foreach($tickets as $ticket){

        echo $ticket->ticket.' | ';

            
            $docnr = substr($ticket->ticket, 0, 10);

            $cantidad = DB::connection('odbc')
            ->table('SAPCPR.ZMM_DETROM')
            ->select('*')
            ->where('DOCNR',  $docnr)
            ->count();


            if($cantidad){

               
                $data = DB::connection('odbc')
                ->table('SAPCPR.ZMM_DETROM')
                ->where('DOCNR', $docnr)
                ->update([
                    'AVEREA' => $ticket->aves_contador??0,
                    'AVEMU'  => $ticket->aves_muertas??0,
                    'AVEDEC' => $ticket->aves_faltantes??0,
                    'AVEF1U' => $ticket->aves_faltantes_robo??0,
                    'AVEF2U' => $ticket->aves_faltantes_carga??0,
                    'AVEF3U' => $ticket->aves_faltantes_imputable??0,
                    'AVEF4U' => $ticket->aves_faltantes_sistema??0,
                    'AVED1U' => $ticket->aves_sobre_escaldado_unidad??0,
                    'AVED1K' => $ticket->aves_sobre_escaldado_kilo??0,
                    'AVED2U' => $ticket->aves_defectuosa_unidad??0,
                    'AVED2K' => $ticket->aves_defectuosa_kilo??0,
                    'AVED3U' => $ticket->aves_rojas_unidad??0,
                    'AVED3K' => $ticket->aves_rojas_kilo??0,
                    'AVED4U' => $ticket->aves_caquexicos_unidad??0,
                    'AVED4K' => $ticket->aves_caquexicos_kilo??0,
                    'AVED5U' => $ticket->aves_mutilados_unidad??0,
                    'AVED5K' => $ticket->aves_mutilados_kilo??0,
                    'AVEDES' => $ticket->aves_descartadas??0,
                ]);

                $ticket->update([
                            'proceso'=>'update_sap']);
            }


       }


    }

    public function formatFecha($fecha){

        if($fecha == '00000000'){
            return null;
        }
        return Carbon::createFromFormat('Ymd', $fecha)->format('Y-m-d');


    }
}