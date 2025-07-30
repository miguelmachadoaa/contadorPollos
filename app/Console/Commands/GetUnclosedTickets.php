<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;
use App\Repositories\SapRepository;
use App\Repositories\AuditoriaRepository;


class GetUnclosedTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-unclosed-tickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected ApiService $apiService;
    protected SapRepository $sapRepository;

    public function __construct(
        ApiService $apiService,
        SapRepository $sapRepository,
        private readonly AuditoriaRepository $auditoriaRepository
        )
    {
        parent::__construct();
        $this->apiService = $apiService;
        $this->sapRepository = $sapRepository;
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tickets = $this->apiService->getOrders();

        $this->auditoriaRepository->create([
            'type'=>'getOrders',
            'type_id'=>1,
            'accion'=>'getOrders',
            'data'=>json_encode($tickets)
        ]);

       // dd($tickets);

        if(isset($tickets['body']['data'])){
            foreach($tickets['body']['data']  as $d){
               echo json_encode($d, true).' /  ';
                echo $d['ticket'].' / ';
               $data = array();
                $data['ticket']= $d['ticket'];
                $data['aves_contador']= $d['aves_contador'];
                $data['aves_muertas']= $d['aves_muertas'];
                $data['aves_faltantes']= $d['aves_faltantes'];
                $data['aves_descartadas']= $d['aves_descartadas'];


                if(count($d['aves_faltantes_detalle'])){

                    foreach($d['aves_faltantes_detalle'] as $detalle){

                        if($detalle['key']=='PHU'){
                            $data['aves_faltantes_robo']=$detalle['cantidad_unidades'];
                            
                        }

                        if($detalle['key']=='PIM'){
                            $data['aves_faltantes_imputable']=$detalle['cantidad_unidades'];
                        }

                        /*if($detalle['key']=='PAH'){
                            $data['aves_faltantes_sistema']=$detalle['cantidad_unidades'];
                        }*/

                        if($detalle['key']=='PCA'){
                            $data['aves_faltantes_carga']=$detalle['cantidad_unidades'];
                        }
                        
                    }
                }

                $ticket =  $this->sapRepository->searchOneBy(['ticket'=>$data['ticket']]);

                if($ticket){
                    $this->sapRepository->update($data, $ticket->id);

                }
            }
        }
    }
}
