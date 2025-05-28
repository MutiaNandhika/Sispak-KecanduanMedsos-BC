<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hasil_gejala', function (Blueprint $table) {
            $table->id('id_hasil_gejala');
            $table->foreignId('id_hasil')->constrained('hasil_diagnosa', 'id_hasil')->onDelete('cascade');
            $table->foreignId('id_gejala')->constrained('gejala', 'id_gejala')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_gejala');
    }
};
