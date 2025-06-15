<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            GejalaSeeder::class,
            DiagnosaSeeder::class,
            SolusiSeeder::class,
            PertanyaanSeeder::class,
            JawabanSeeder::class,
            AturanGejalaSeeder::class,
            HasilDiagnosaSeeder::class,
            HasilGejalaSeeder::class,
        ]);
        User::factory()->create([
            'nama' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'user',
        ]);
    }
}
