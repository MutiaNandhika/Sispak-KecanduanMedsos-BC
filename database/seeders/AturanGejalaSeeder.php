<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AturanGejalaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id_aturan' => 1,
                'id_gejala' => 1,
                'id_diagnosa' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 2,
                'id_gejala' => 2,
                'id_diagnosa' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 3,
                'id_gejala' => 3,
                'id_diagnosa' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 4,
                'id_gejala' => 4,
                'id_diagnosa' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 5,
                'id_gejala' => 5,
                'id_diagnosa' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 6,
                'id_gejala' => 6,
                'id_diagnosa' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 7,
                'id_gejala' => 7,
                'id_diagnosa' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 8,
                'id_gejala' => 8,
                'id_diagnosa' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 9,
                'id_gejala' => 9,
                'id_diagnosa' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 10,
                'id_gejala' => 10,
                'id_diagnosa' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 11,
                'id_gejala' => 11,
                'id_diagnosa' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 12,
                'id_gejala' => 12,
                'id_diagnosa' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 13,
                'id_gejala' => 13,
                'id_diagnosa' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 14,
                'id_gejala' => 14,
                'id_diagnosa' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 15,
                'id_gejala' => 15,
                'id_diagnosa' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 16,
                'id_gejala' => 16,
                'id_diagnosa' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 17,
                'id_gejala' => 17,
                'id_diagnosa' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 18,
                'id_gejala' => 18,
                'id_diagnosa' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 19,
                'id_gejala' => 19,
                'id_diagnosa' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_aturan' => 20,
                'id_gejala' => 20,
                'id_diagnosa' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('aturan_gejala')->insert($data);
    }
}
