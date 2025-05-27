<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hasil_diagnosa', function (Blueprint $table) {
            $table->id('id_hasil');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_diagnosa')->constrained('diagnosa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_diagnosa');
    }
};
