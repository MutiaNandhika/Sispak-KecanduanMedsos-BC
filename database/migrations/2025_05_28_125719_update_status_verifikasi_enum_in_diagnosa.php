<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('diagnosa', function (Blueprint $table) {
            $table->dropColumn('status_verifikasi');
        });

        Schema::table('diagnosa', function (Blueprint $table) {
            $table->enum('status_verifikasi', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
        });
    }

    public function down()
    {
        Schema::table('diagnosa', function (Blueprint $table) {
            $table->dropColumn('status_verifikasi');
        });

        Schema::table('diagnosa', function (Blueprint $table) {
            $table->enum('status_verifikasi', ['pending', 'diterima', 'ditolak'])->default('pending');
        });
    }
};
