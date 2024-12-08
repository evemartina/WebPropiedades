<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralInformationTable extends Migration
{
    public function up()
    {
        Schema::create('general_information', function (Blueprint $table) {
            $table->id();
            $table->string('mision', 500)->nullable();     // Campo para la misión
            $table->string('vision', 500)->nullable();     // Campo para la visión
            $table->string('horarios', 255)->nullable();   // Campo para los horarios
            $table->string('email', 255)->nullable();      // Campo para el email de contacto
            $table->string('telefono', 20)->nullable();    // Campo para el teléfono de contacto
            $table->string('whatsapp', 20)->nullable();    // Campo para WhatsApp
            $table->string('instagram', 255)->nullable();  // Campo para el enlace de Instagram
            $table->string('facebook', 255)->nullable();   // Campo para el enlace de Facebook
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('general_information');
    }
}
