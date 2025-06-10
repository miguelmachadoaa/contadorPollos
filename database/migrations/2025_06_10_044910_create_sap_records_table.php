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

            $table->string('BUKRS', 10);       // Sociedad o compañía
            $table->string('GJAHR', 4);        // Año fiscal (4 dígitos)
            $table->string('DOCNR', 20);       // Número de documento
            $table->string('PLACA', 20)->nullable();      // Placa vehículo
            $table->decimal('TARAP', 10, 2)->nullable();  // Tarifa o importe
            $table->date('FECHP')->nullable();             // Fecha (entrada?)
            $table->time('HORAP')->nullable();             // Hora

            $table->decimal('BRUTP', 10, 2)->nullable();  // Importe bruto
            $table->date('FECBP')->nullable();
            $table->time('HORBP')->nullable();

            $table->string('REPEP', 50)->nullable();      // Repetición o referencia
            $table->date('FECRP')->nullable();
            $table->time('HORRP')->nullable();

            $table->decimal('NETOP', 10, 2)->nullable();  // Importe neto
            $table->date('FECFP')->nullable();
            $table->time('HORFP')->nullable();

            $table->string('CODTRA', 20)->nullable();     // Código transporte
            $table->string('CODCH', 20)->nullable();       // Código chasis o similar
            $table->string('CODAC', 20)->nullable();       // Código acción
            $table->string('NORCA', 20)->nullable();       // Número de carátula o similar
            $table->string('CODGA', 20)->nullable();       // Código garantía
            $table->string('NROJAULA', 20)->nullable();    // Número de jaula o caja

            $table->decimal('AVEXJ', 10, 2)->nullable();
            $table->string('NUMLO', 20)->nullable();
            $table->decimal('AVEMU', 10, 2)->nullable();
            $table->decimal('AVEDEC', 10, 2)->nullable();
            $table->decimal('AVEDES', 10, 2)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('DOCNR');
            $table->index('BUKRS');


        });
    }

    public function down()
    {
        Schema::dropIfExists('sap_records');
    }
   
};
