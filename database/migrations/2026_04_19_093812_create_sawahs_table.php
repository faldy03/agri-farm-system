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
        Schema::create('sawahs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->string('nama');
        $table->double('luas');
        $table->decimal('lokasi_lat', 10, 7);
        $table->decimal('lokasi_lng', 10, 7);
        $table->text('deskripsi')->nullable();
        $table->enum('status', ['belum tanam', 'tanam', 'perawatan', 'panen'])->default('belum tanam');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sawahs');
    }
};
