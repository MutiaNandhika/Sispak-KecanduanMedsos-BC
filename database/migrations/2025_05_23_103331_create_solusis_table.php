<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('solusi', function (Blueprint $table) {
            $table->id('id_solusi');
            $table->foreignId('id_diagnosa')->constrained('diagnosa', 'id_diagnosa')->onDelete('cascade');
            $table->text('solusi_diagnosa');
            $table->enum('status_verifikasi', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->text('catatan_pakar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solusi');
    }
};
