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
        Schema::create('stok__transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produks')->cascadeOnDelete();
            $table->enum('tipe', ['masuk','keluar'])->default('masuk');
            $table->double('jumlah')->nullable();
            $table->date('tanggal');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok__transaksis');
    }
};
