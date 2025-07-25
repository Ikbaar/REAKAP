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
        Schema::create('l_t_h_s', function (Blueprint $table) {
    $table->id();
    $table->string('nama_koperasi');
    $table->text('total_kepemilikan'); // ini yang "Total Kepemilikan Tanah dan Sejarah"
    $table->integer('jumlah_percils')->nullable();
    $table->decimal('luas_total', 10, 2)->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('l_t_h_s');
    }
};
