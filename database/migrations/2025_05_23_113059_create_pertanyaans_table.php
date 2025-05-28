<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up(): void
        {
            Schema::create('pertanyaan', function (Blueprint $table) {
                $table->id('id_pertanyaan');
                $table->foreignId('id_gejala')->constrained('gejala', 'id_gejala')->onDelete('cascade');
                $table->string('pertanyaan_gejala');
                $table->enum('status_verifikasi', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
                $table->text('catatan_pakar')->nullable();
                $table->timestamps();
            });
        }

    public function down(): void
    {
        Schema::dropIfExists('pertanyaan');
    }
};
