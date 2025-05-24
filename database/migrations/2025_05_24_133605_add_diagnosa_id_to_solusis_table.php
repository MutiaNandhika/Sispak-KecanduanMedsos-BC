<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('solusis', function (Blueprint $table) {
            // Hapus kolom lama (string)
            $table->dropColumn('diagnosa');

            // Tambah kolom foreign key baru
            $table->foreignId('diagnosa_id')->after('id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('solusis', function (Blueprint $table) {
            // Hapus foreign key dan kolom diagnosa_id
            $table->dropForeign(['diagnosa_id']);
            $table->dropColumn('diagnosa_id');

            // Balikin kolom lama (jaga-jaga rollback)
            $table->string('diagnosa')->after('id');
        });
    }
};
