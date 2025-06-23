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

                $this->sapRepository->saveFromApi($d);
            }
        }
    }
}
