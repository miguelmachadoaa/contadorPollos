<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class  SapRecord extends Model
{
    protected $table = 'sap_records'; // tabla local para registro (puedes crearla si quieres)
    
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'sociedad',
        'ejercicio',
        'ticket',
        'placa',
        'peso_tara_inicial',
        'fecha_tara_inicial',
        'hora_tara_inicial',
        'peso_bruto_planta',
        'prom_neto_planta',
        'fecha_inicio',
        'hora_inicio',
        'peso_bruto_espera',
        'fecha_merma',
        'hora_merma',
        'neto_fin_planta',
        'fecha_fin_planta',
        'hora_fin_planta',
        'transportista',
        'ci_chofer',
        'chofer',
        'cod_procedencia',
        'procedencia',
        'orden_carga',
        'n_galpon',
        'jaulas',
        'aves_por_jaula',
        'cant_aves',
        'num_lote',
        'aves_muertas',
        'aves_faltantes',
        'aves_descartadas',
        'aves_contador',
    ];
} 
