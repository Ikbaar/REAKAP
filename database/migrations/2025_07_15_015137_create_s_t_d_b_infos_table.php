<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('s_t_d_b_infos', function (Blueprint $table) {
    $table->id();
    $table->string('nama_koperasi');
    $table->integer('formulir_selesai')->nullable();
    $table->integer('stdb_ke_disbun')->nullable();
    $table->integer('rilis_stdb')->nullable();
    $table->integer('tidak_ada_ish')->nullable();
    $table->integer('tidak_ada_percils')->nullable();
    $table->decimal('luas_total', 10, 2)->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_t_d_b_infos');
    }
};
