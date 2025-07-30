<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;
use App\Repositories\SapRepository;
use App\Repositories\AuditoriaRepository;


class GetUnclosedDiscards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-unclosed-discards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected ApiService $apiService;
    protected SapRepository $sapRepository;
    protected AuditoriaRepository $auditoriaRepository;

    public function __construct(
        ApiService $apiService,
        SapRepository $sapRepository,
        AuditoriaRepository $auditoriaRepository
        )
    {
        parent::__construct();
        $this->apiService = $apiService;
        $this->sapRepository = $sapRepository;
        $this->auditoriaRepository = $auditoriaRepository;
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $discards = $this->apiService->getDiscards();

        $this->auditoriaRepository->create([
            'type'=>'getDiscards',
            'type_id'=>1,
            'accion'=>'getDiscards',
            'data'=>json_encode($discards)
        ]);

        if(isset($discards['body']['data'])){
            foreach($discards['body']['data']  as $d){
                echo json_encode($d).' /  ';

                $data = array();
                $data['ticket']= $d['ticket'];
                $data['aves_descartadas']= $d['aves_descartadas'];

                if(count($d['aves_descartadas_detalle'])){

                    foreach($d['aves_descartadas_detalle'] as $detalle){

                        if($detalle['key']=='PSE'){
                            $data['aves_sobre_escaldado_unidad']=$detalle['cantidad_unidades'];
                            $data['aves_sobre_escaldado_kilo']=$detalle['cantidad_neto'];
                        }

                        if($detalle['key']=='PDF'){
                            $data['aves_defectuosa_unidad']=$detalle['cantidad_unidades'];
                            $data['aves_defectuosa_kilo']=$detalle['cantidad_neto'];
                        }

                        if($detalle['key']=='PRJ'){
                            $data['aves_rojas_unidad']=$detalle['cantidad_unidades'];
                            $data['aves_rojas_kilo']=$detalle['cantidad_neto'];
                        }

                        if($detalle['key']=='PCQ'){
                            $data['aves_caquexicos_unidad']=$detalle['cantidad_unidades'];
                            $data['aves_caquexicos_kilo']=$detalle['cantidad_neto'];
                        }

                        if($detalle['key']=='PMT'){
                            $data['aves_mutilados_unidad']=$detalle['cantidad_unidades'];
                            $data['aves_mutilados_kilo']=$detalle['cantidad_neto'];
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
