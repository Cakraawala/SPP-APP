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
        Schema::create('spp', function (Blueprint $table) {
            $table->id();
            $table->date('tahun_ajaran');
            $table->integer('nominal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spp');
    }
};
