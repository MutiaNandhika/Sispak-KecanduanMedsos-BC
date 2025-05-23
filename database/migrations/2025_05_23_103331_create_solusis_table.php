<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('solusis', function (Blueprint $table) {
            $table->id();
            $table->string('diagnosa');
            $table->text('solusi');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('solusis');
    }
};
