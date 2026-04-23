<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi__pemasukans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sawah_id')->constrained()->cascadeOnDelete();
            $table->foreignId('panen_id')->constrained()->cascadeOnDelete();
            $table->double('jumlah');
            $table->decimal('total', 15, 2);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi__pemasukans');
    }
};
