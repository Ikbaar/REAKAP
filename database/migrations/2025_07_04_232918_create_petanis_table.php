<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('petanis', function (Blueprint $table) {
            $table->id();
            $table->string('landid_vbw')->nullable();
            $table->string('name')->nullable(); // Name
            $table->string('koperasi')->nullable();
            $table->string('yop_vbw')->nullable();
            $table->string('village')->nullable();
            $table->string('luas_legalitas')->nullable();
            $table->string('luas_shp')->nullable();
            $table->string('legalitas')->nullable();
            $table->string('stdb')->nullable();
            $table->string('point_x')->nullable();
            $table->string('point_y')->nullable();
            $table->string('fkh548')->nullable();
            $table->string('konsesirea')->nullable();
            $table->string('wiup')->nullable();
            $table->string('iuphhk_hti_ha')->nullable();
            $table->string('nomor_legalitas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petanis');
    }
};
