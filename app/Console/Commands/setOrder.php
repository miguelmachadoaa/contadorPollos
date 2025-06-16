<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;
use App\Repositories\SapRepository;
use App\Repositories\AuditoriaRepository;


class setOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-order';

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
        $orders = $this->sapRepository->searchBy([
            'fecha_tara_inicial'=>date('Y-m-d')
        ]);

        foreach($orders as $orden ){

           $response =  $this->apiService->setOrder([
                "ticket"=> $orden->ticket,
                "placa"=> $orden->placa,
                "tara_inicial"=> $orden->peso_tara_inicial,
                "fecha_inicial"=> $orden->fecha_tara_inicial,
                "hora_inicial"=> $orden->hora_tara_inicial,
                "bruto_planta"=> $orden->peso_bruto_planta,
                "neto_planta"=> $orden->prom_neto_planta,
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
                "cantidad_jaulas"=> $orden->jaulas,
                "cantidad_aves_jaula"=> $orden->aves_por_jaula,
            ]);

            dd($response);

        }

       
    }
}
