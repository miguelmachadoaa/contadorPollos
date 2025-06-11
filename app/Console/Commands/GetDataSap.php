<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $retenciones = DB::connection('odbc')
        ->table('SAPCPR.ZFI_IMPUESTOS')
        ->select('*')
       // ->where('FECHA',  date("Ymd"))
       // ->orWhere('FECHA',  date("Ymd",strtotime('-1 day')))
       // ->orWhere('FECHA',  date("Ymd",strtotime('-2 day')))
       ->limit(1)
        ->get();

        dd($retenciones);
    }
}
