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
        Schema::create('prediksi__panens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sawah_id')->constrained('sawahs')->cascadeOnDelete();
            $table->double('estimasi_kg');
            $table->date('tanggal_prediksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prediksi__panens');
    }
};
