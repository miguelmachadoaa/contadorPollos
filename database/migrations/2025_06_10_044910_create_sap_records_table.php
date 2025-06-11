<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

     public function up()
    {
        Schema::create('sap_records', function (Blueprint $table) {
            $table->id();

            $table->string('sociedad')->nullable();
            $table->string('ejercicio')->nullable();
            $table->string('ticket')->nullable();
            $table->string('placa')->nullable();

            $table->decimal('peso_tara_inicial', 10, 2)->nullable();
            $table->date('fecha_tara_inicial')->nullable();
            $table->time('hora_tara_inicial')->nullable();

            $table->decimal('peso_bruto_planta', 10, 2)->nullable();
            $table->decimal('prom_neto_planta', 10, 2)->nullable();

            $table->date('fecha_inicio')->nullable();
            $table->time('hora_inicio')->nullable();

            $table->decimal('peso_bruto_espera', 10, 2)->nullable();

            $table->date('fecha_merma')->nullable();
            $table->time('hora_merma')->nullable();

            $table->decimal('neto_fin_planta', 10, 2)->nullable();
            $table->date('fecha_fin_planta')->nullable();
            $table->time('hora_fin_planta')->nullable();

            $table->string('transportista')->nullable();
            $table->string('ci_chofer')->nullable();
            $table->string('chofer')->nullable();

            $table->string('cod_procedencia')->nullable();
            $table->string('procedencia')->nullable();

            $table->string('orden_carga')->nullable();
            $table->string('n_galpon')->nullable();
            $table->integer('jaulas')->nullable();
            $table->integer('aves_por_jaula')->nullable();
            $table->integer('cant_aves')->nullable();
            $table->string('num_lote')->nullable();

            $table->integer('aves_muertas')->nullable();
            $table->integer('aves_faltantes')->nullable();
            $table->integer('aves_descartadas')->nullable();
            $table->integer('aves_contador')->nullable();
            $table->timestamps();

            $table->softDeletes();

        });
    }

    public function down()
    {
        Schema::dropIfExists('sap_records');
    }
   
};
