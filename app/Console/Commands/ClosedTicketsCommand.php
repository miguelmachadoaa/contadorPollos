<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;
use App\Repositories\SapRepository;
use App\Repositories\AuditoriaRepository;


class ClosedTicketsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:closed-tickets';

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

                echo $d['ticket'].' / ';

                $this->sapRepository->saveFromApi($d);

                $response = $this->apiService->closeticket(['ticket'=>$d['ticket']]);

                if($response['status']==200){
                    $this->sapRepository->updateFromTicket(['status'=>'C'], $d['ticket']);
                }
            }
        }
    }
}
