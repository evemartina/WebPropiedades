<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');               // Nombre de la propiedad
            $table->text('descripcion');            // Descripción de la propiedad
            $table->string('direccion');            // Dirección

            $table->unsignedBigInteger('property_type_id');  // Llave foránea a los tipos de propiedad
            $table->string('imagen_principal')->nullable(); // Imagen principal de la propiedad
            $table->decimal('precio', 10, 2);       // Precio de la propiedad
            $table->integer('habitaciones')->nullable(); // Número de habitaciones
            $table->integer('banos')->nullable();        // Número de baños
            $table->integer('metros_totales')->nullable(); // Metros cuadrados
            $table->timestamps();

            // Llave foránea a property_types
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
