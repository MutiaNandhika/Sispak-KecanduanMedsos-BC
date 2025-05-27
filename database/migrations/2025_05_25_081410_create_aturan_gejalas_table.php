<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aturan_gejala', function (Blueprint $table) {
            $table->id('id_aturan');
            $table->foreignId('id_gejala')->constrained('gejala')->onDelete('cascade');
            $table->foreignId('id_diagnosa')->constrained('diagnosa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aturan_gejala');
    }
};
