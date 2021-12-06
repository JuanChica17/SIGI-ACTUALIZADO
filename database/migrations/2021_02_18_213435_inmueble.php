<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmueble', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_inmueble', 50);
            $table->string('direccion', 100);
            $table->string('tipo', 25);
            $table->decimal('precio_venta', 12, 2);
            $table->decimal('precio_alquiler', 12, 2);
            $table->text('descripcion');
            $table->text('estado', 30);
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
        Schema::dropIfExists('inmueble');
    }
}
