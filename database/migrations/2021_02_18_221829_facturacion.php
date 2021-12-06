<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Facturacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacion', function (Blueprint $table) {
            $table->id();
            $table->String('mes_a_pagar', 20);
            $table->text('concepto');
            $table->decimal('valor', 12, 2);
            $table->text('deducciones');
            $table->decimal('total_pagar', 12, 2);
            $table->foreignId('id_alquiler')->constrained('alquiler');
            $table->foreignId('id_cliente')->constrained('cliente');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturacion');
    }
}
