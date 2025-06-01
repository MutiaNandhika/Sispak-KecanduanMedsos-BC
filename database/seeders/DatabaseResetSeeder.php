<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseResetSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('PRAGMA foreign_keys = OFF;'); // untuk SQLite
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // jika pakai MySQL

        DB::table('jawaban')->truncate();
        DB::table('hasil_diagnosa')->truncate();
        DB::table('aturan_gejala')->truncate();
        DB::table('pertanyaan')->truncate();
        DB::table('gejala')->truncate();
        DB::table('solusi')->truncate();
        DB::table('diagnosa')->truncate();

        DB::statement('PRAGMA foreign_keys = ON;');
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('✅ Semua data berhasil dihapus.');
    }
}
