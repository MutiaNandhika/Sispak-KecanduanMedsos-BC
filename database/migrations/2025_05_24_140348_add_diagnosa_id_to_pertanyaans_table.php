<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom diagnosa_id ke tabel pertanyaans.
     */
    public function up(): void
{
    Schema::table('pertanyaans', function (Blueprint $table) {
        if (!Schema::hasColumn('pertanyaans', 'diagnosa_id')) {
            $table->foreignId('diagnosa_id')
                  ->after('id')
                  ->constrained()
                  ->onDelete('cascade');
        }
    });
}

    /**
     * Rollback perubahan (hapus kolom diagnosa_id).
     */
    public function down(): void
    {
        Schema::table('pertanyaans', function (Blueprint $table) {
            $table->dropForeign(['diagnosa_id']);
            $table->dropColumn('diagnosa_id');
        });
    }
};
