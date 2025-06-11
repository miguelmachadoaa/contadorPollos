<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Notificaciones;
use App\Models\Retencion;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use DB;

use Illuminate\Console\Command;

class ImportRetenciones extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'retenciones:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Carga de retenciones en tabla retenciones laravel ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ini_set('memory_limit', '1024M'); // or you could use 1G 

        echo "inicio /";

        echo "consultando /";

        $destinatarios=['miguelmachadoaa@gmail.com', 'maribel.olivares@grupolacaridad.com','Jesus.Cardozo@grupolacaridad.com','Kandhya.Barreto@grupolacaridad.com','Maria.Taly@grupolacaridad.com'];

       // \Mail::to($destinatarios)->send(new \App\Mail\NotificacionCron("Mensaje de pruebas para verificar correo "));

       // dd(date("Ymd"));

         $r=Retencion::orderBy('ID_RETENCION', 'desc')->skip(1)->first();

        $id_retencion=0;
        
       if(isset($r->ID_RETENCION)){ $id_retencion = $r->ID_RETENCION; };

        $prov = array();

        $this->buscar( $prov,  $id_retencion);

        $cantidad_local = Retencion::count();
        $cantidad_sap = DB::connection('odbc')
        ->table('SAPCPR.ZFI_IMPUESTOS')
        ->count();

        $mensaje =  "Ejecucion de cron Import Retenciones , Retenciones actualizadas, existen ".$cantidad_local." registros en la web  y en SAP ".$cantidad_sap;

        $destinatarios=['miguelmachadoaa@gmail.com', 'maribel.olivares@grupolacaridad.com','Jesus.Cardozo@grupolacaridad.com','Kandhya.Barreto@grupolacaridad.com','Maria.Taly@grupolacaridad.com'];

        \Mail::to($destinatarios)->send(new \App\Mail\NotificacionCron($mensaje));

        #regiondd($retenciones);

        echo "completado /";

    }

    private function buscar( $prov, $id_retencion){

        $retenciones = DB::connection('odbc')
        ->table('SAPCPR.ZFI_IMPUESTOS')
        ->select('*')
        ->where('FECHA',  date("Ymd"))
        ->orWhere('FECHA',  date("Ymd",strtotime('-1 day')))
        ->orWhere('FECHA',  date("Ymd",strtotime('-2 day')))
      // ->limit(1)
        ->get();

      //  dd($retenciones);

         echo count($retenciones)." / ";

          echo $id_retencion." / ";
        
        if (count($retenciones)) {

            $res = $this->procesar($retenciones, $prov);

            //$this->buscar( $res['prov'], $res['id_retencion']);
        }

        return $prov;

    }


    private function procesar($retenciones, $prov){

        echo "procesando /";

        foreach($retenciones as $retencion){

            echo '.';

            $r=Retencion::where('ID_RETENCION',"like", "%".$retencion->ID)->first();

            if(!isset($r->id)){

                echo $retencion->ID.' / ';

                Retencion::create(
                    [
                        'MANDT'=>$retencion->MANDT,
                        'BUKRS'=>$retencion->BUKRS,
                        'LIFNR'=>$retencion->LIFNR,
                        'TIPO_RETENCION'=>$retencion->TIPO_RETENCION,
                        'PERIODO_IMPOSICION'=>$retencion->PERIODO_IMPOSICION,
                        'BELNR'=>$retencion->BELNR,
                        'GJAHR'=>$retencion->GJAHR,
                        'BUZEI'=>$retencion->BUZEI,
                        'RIF_AGENTE'=>$retencion->RIF_AGENTE,
                        'NOMBRE_AGENTE'=> utf8_encode($retencion->NOMBRE_AGENTE),
                        'DIREC_AGENTE'=>utf8_encode($retencion->DIREC_AGENTE),
                        'FECHA_DOC'=>$retencion->FECHA_DOC,
                        'TIPO_OPERACION'=>$retencion->TIPO_OPERACION,
                        'RIF_PROVEEDOR'=>$retencion->RIF_PROVEEDOR,
                        'NOMBRE_PROVEEDOR'=>utf8_encode($retencion->NOMBRE_PROVEEDOR),
                        'DIREC_PROVEEDOR'=>utf8_encode($retencion->DIREC_PROVEEDOR),
                        'NUM_FACTURA'=>$retencion->NUM_FACTURA,
                        'NUM_CONTROL'=>$retencion->NUM_CONTROL,
                        'FECHA_OPERACION'=>$retencion->FECHA_OPERACION,
                        'CONCEPTO_RETENCION'=>utf8_encode($retencion->CONCEPTO_RETENCION),
                        'MONTO_TOTAL'=>$retencion->MONTO_TOTAL,
                        'BASE_IMPONIBLE'=>$retencion->BASE_IMPONIBLE,
                        'MONTO_EXCENTO'=>$retencion->MONTO_EXCENTO,
                        'PORCENTAJE_RETENCION'=>$retencion->PORCENTAJE_RETENCION,
                        'ALICUOTA'=>$retencion->ALICUOTA,
                        'IMPORTE_RETENIDO'=>$retencion->IMPORTE_RETENIDO,
                        'MONTO_IVA_RETENIDO'=>$retencion->MONTO_IVA_RETENIDO,
                        'IMPUESTO_CAUSADO'=>$retencion->IMPUESTO_CAUSADO,
                        'MONTO_RETENIDO'=>$retencion->MONTO_RETENIDO,
                        'CTA_AD'=>$retencion->CTA_AD,
                        'DOC_AFECTADO'=>$retencion->DOC_AFECTADO,
                        'NUM_COMPROBANTE'=>$retencion->NUM_COMPROBANTE,
                        'DESCP_TIPO_RETENCION'=>utf8_encode($retencion->DESCP_TIPO_RETENCION),
                        'FECHA_EMISION'=>$retencion->FECHA_EMISION,
                        'FECHA_ENTREGA'=>$retencion->FECHA_ENTREGA,
                        'NOTA_DEBITO'=>$retencion->NOTA_DEBITO,
                        'NOTA_CREDITO'=>$retencion->NOTA_CREDITO,
                        'EMAIL'=>$retencion->EMAIL,
                        'LICENCIA'=>$retencion->LICENCIA,
                        'WITHT'=>$retencion->WITHT,
                        'WT_WITHCD'=>$retencion->WT_WITHCD,
                        'USUARIO'=>$retencion->USUARIO,
                        'FECHA'=>$retencion->FECHA,
                        'SGTXT'=>$retencion->SGTXT,
                        'EMAIL_AGENTE'=>$retencion->EMAIL_AGENTE,
                        'TLF_AGENTE'=>$retencion->TLF_AGENTE,
                        'TLF'=>$retencion->TLF,
                        'BRTXT'=>$retencion->BRTXT,
                        'LICENCIA_ACT'=>$retencion->LICENCIA_ACT,
                        'ANULADO'=>$retencion->ANULADO?'':NULL,
                        'FE_ANULADO'=>$retencion->FE_ANULADO??NULL,
                        'ID_RETENCION'=>$retencion->ID
                        ]
                    );
    
                   
                if (!in_array($retencion->RIF_PROVEEDOR, $prov)) {

                    $prov[]=$retencion->RIF_PROVEEDOR;

                     if(trim($retencion->EMAIL)!=''){
    
                        $u=User::where('rif', $retencion->RIF_PROVEEDOR)->first();
    
                        if(isset($u->id)){

                            if ($u->email==$retencion->EMAIL) {
                                // code...
                            }else{
                                
                                $u->update(['email'=>$retencion->EMAIL]);

                                 Notificaciones::create([
                                    'id_usuario'=>$u->id,
                                    'id_notificacion' =>"1",
                                    'origen' =>"2"
                                ]);
                            }
    
                        }else{
    
                            $u=User::create([
                                'name' => $retencion->NOMBRE_PROVEEDOR,
                                'email' => $retencion->EMAIL,
                                'rif' => $retencion->RIF_PROVEEDOR,
                                'admin' => '3',
                                'role' => '3',
                                'password' => Hash::make($retencion->RIF_PROVEEDOR),
                            ]);

                            Notificaciones::create([
                                'id_usuario'=>$u->id,
                                'id_notificacion' =>"1",
                                'origen' =>"1"
                            ]);
    
                        }
    
    
                    }

                }

            }//end if 
                
        }//endforeach


        return ['prov'=>$prov, 'id_retencion'=>$retencion->ID];

    }
}