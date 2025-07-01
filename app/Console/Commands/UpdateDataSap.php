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

      // dd($tickets);

       foreach($tickets as $ticket){

        echo $ticket->ticket.' | ';

            $data = DB::connection('odbc')
            ->table('SAPCPR.ZMM_DETROM')
            ->where('DOCNR', $ticket->ticket)
            ->update([
                'AVEREA' => $ticket->aves_contador,
                'AVEMU'  => $ticket->aves_muertas,
                'AVEDEC' => $ticket->aves_faltantes,
                'AVEF1U' => $ticket->aves_faltantes_robo,
                'AVEF2U' => $ticket->aves_faltantes_carga,
                'AVEF3U' => $ticket->aves_faltantes_imputable,
                'AVEF4U' => $ticket->aves_faltantes_sistema,
                'AVED1U' => $ticket->aves_sobre_escaldado_unidad,
                'AVED1K' => $ticket->aves_sobre_escaldado_kilo,
                'AVED2U' => $ticket->aves_defectuosa_unidad,
                'AVED2K' => $ticket->aves_defectuosa_kilo,
                'AVED3U' => $ticket->aves_rojas_unidad,
                'AVED3K' => $ticket->aves_rojas_kilo,
                'AVED4U' => $ticket->aves_mutilados_unidad,
                'AVED4K' => $ticket->aves_mutilados_kilo,
                'AVEDES' => $ticket->aves_descartadas,
            ]);

           // dd($data);

       }


    }

    public function formatFecha($fecha){

        if($fecha == '00000000'){
            return null;
        }
        return Carbon::createFromFormat('Ymd', $fecha)->format('Y-m-d');


    }
}


