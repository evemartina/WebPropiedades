<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration            {



        public function up(): void    {
            Schema::create('regions', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });

            Schema::create('cities', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->foreignId('region_id')->constrained('regions')->onDelete('cascade');
                $table->timestamps();
            });

            Schema::table('properties', function (Blueprint $table) {
                $table->foreignId('region_id')->constrained('regions')->onDelete('cascade');
                $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            });
        }

        public function down(): void    {
            Schema::dropIfExists('regions');
            Schema::dropIfExists('cities');
        }
};
