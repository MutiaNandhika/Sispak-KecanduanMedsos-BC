<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id('id_jawaban');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_pertanyaan')->constrained('pertanyaan')->onDelete('cascade');
            $table->enum('jawaban', ['ya', 'tidak']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jawaban');
    }
};
