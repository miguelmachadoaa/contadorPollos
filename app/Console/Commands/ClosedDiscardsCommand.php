<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;
use App\Repositories\SapRepository;
use App\Repositories\AuditoriaRepository;


class ClosedDiscardsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:closed-discards';

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
        $tickets = $this->apiService->getDiscards();

        $this->auditoriaRepository->create([
            'type'=>'getDiscards',
            'type_id'=>1,
            'accion'=>'getDiscards',
            'data'=>json_encode($tickets)
        ]);

       // dd($tickets);

        if(isset($tickets['body']['data'])){
            foreach($tickets['body']['data']  as $d){

                echo $d['ticket'].' / ';

                 $data = array();
                $data['ticket']= $d['ticket'];
                $data['aves_descartadas']= $d['aves_descartadas'];

                if(count($d['aves_descartadas_detalle'])){

                    foreach($d['aves_descartadas_detalle'] as $detalle){

                        if($detalle['key']=='PSE'){
                            $data['aves_sobre_escaldado_unidad']=$detalle['cantidad_unidades'];
                        }

                        if($detalle['key']=='PDF'){
                            $data['aves_defectuosa_unidad']=$detalle['cantidad_unidades'];
                        }

                        if($detalle['key']=='PRJ'){
                            $data['aves_rojas_unidad']=$detalle['cantidad_unidades'];
                        }

                        if($detalle['key']=='PCQ'){
                            $data['aves_caquexicos_unidad']=$detalle['cantidad_unidades'];
                        }

                        if($detalle['key']=='PMT'){
                            $data['aves_mutilados_unidad']=$detalle['cantidad_unidades'];
                        }
                    }
                }

                $ticket =  $this->sapRepository->searchOneBy(['ticket'=>$data['ticket']]);

                if($ticket){
                    $this->sapRepository->update($data, $ticket->id);

                }

                $response = $this->apiService->closeDiscard(['ticket'=>$d['ticket']]);

                if($response['status']==200){
                    $this->sapRepository->updateFromTicket(['status'=>'C'], $d['ticket']);

                    $ticket->update([
                        'proceso'=>'descarte_cerrado']);
                }
            }
        }
    }
}
