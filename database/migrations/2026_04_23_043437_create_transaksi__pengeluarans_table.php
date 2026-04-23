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
        Schema::create('transaksi__pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sawah_id')->constrained()->cascadeOnDelete();
            $table->foreignId('produk_id')->nullable()->constrained()->nullOnDelete();
            $table->double('jumlah')->nullable();
            $table->decimal('biaya', 15, 2);
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
        Schema::dropIfExists('transaksi__pengeluarans');
    }
};
