<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Venta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio', 12, 2);
            $table->string('forma_pago', 25);
            $table->string('nombre_comprador', 50);
            $table->string('correo', 100);
            $table->string('direccion', 100);
            $table->string('telefono', 15);
            $table->string('referencia_catastral', 30);
            $table->foreignId('id_inmueble')->constrained('inmueble');
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
        Schema::dropIfExists('venta');
    }
}
