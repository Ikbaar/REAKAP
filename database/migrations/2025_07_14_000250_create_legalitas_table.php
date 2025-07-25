<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('legalitas', function (Blueprint $table) {
        $table->id();
        $table->string('name_cooperatives');
        $table->integer('shm')->default(0);
        $table->integer('sppt')->default(0);
        $table->integer('skpt')->default(0);
        $table->integer('sklg')->default(0);
        $table->integer('customary')->default(0);
        $table->integer('skt')->default(0);
        $table->integer('other')->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legalitas');
    }
};
