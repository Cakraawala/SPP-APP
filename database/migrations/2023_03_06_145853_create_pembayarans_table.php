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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->index();
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_admin')->index();
            $table->foreign('id_admin')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_spp')->index();
            $table->foreign('id_spp')->references('id')->on('spp')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah_bayar');
            $table->integer('tahun_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
