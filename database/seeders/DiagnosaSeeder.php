<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagnosaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('diagnosa')->insert([
            [
                'id_diagnosa' => 1,
                'nama_diagnosa' => 'Tidak Kecanduan',
                'deskripsi' => 'Pengguna tidak terindikasi kecanduan sosial media',
                'catatan_pakar' => 'Sudah benar',
                'created_at' => '2025-06-01 10:01:10',
                'updated_at' => '2025-06-01 12:02:12',
                'status_verifikasi' => 'diterima',
            ],
            [
                'id_diagnosa' => 2,
                'nama_diagnosa' => 'Mulai Berisiko',
                'deskripsi' => 'Pengguna ada indikasi kecanduan sosial media',
                'catatan_pakar' => 'Sudah benar',
                'created_at' => '2025-06-01 10:02:05',
                'updated_at' => '2025-06-01 12:02:18',
                'status_verifikasi' => 'diterima',
            ],
            [
                'id_diagnosa' => 3,
                'nama_diagnosa' => 'Kecanduan Ringan',
                'deskripsi' => 'Pengguna terindikasi kecanduan sosial media tingkat ringan',
                'catatan_pakar' => 'Sudah benar',
                'created_at' => '2025-06-01 10:02:29',
                'updated_at' => '2025-06-01 12:02:24',
                'status_verifikasi' => 'diterima',
            ],
            [
                'id_diagnosa' => 4,
                'nama_diagnosa' => 'Kecanduan Sedang',
                'deskripsi' => 'Pengguna terindikasi kecanduan sosial media tingkat sedang',
                'catatan_pakar' => 'Sudah benar',
                'created_at' => '2025-06-01 10:02:48',
                'updated_at' => '2025-06-01 12:02:30',
                'status_verifikasi' => 'diterima',
            ],
            [
                'id_diagnosa' => 5,
                'nama_diagnosa' => 'Kecanduan Berat',
                'deskripsi' => 'Pengguna terindikasi kecanduan sosial media tingkat berat',
                'catatan_pakar' => 'Sudah benar',
                'created_at' => '2025-06-01 10:03:03',
                'updated_at' => '2025-06-01 12:02:36',
                'status_verifikasi' => 'diterima',
            ],
            [
                'id_diagnosa' => 6,
                'nama_diagnosa' => 'contoh diagnosa',
                'deskripsi' => 'hanya contoh untuk dihapus',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:03:56',
                'updated_at' => '2025-06-01 10:03:56',
                'status_verifikasi' => 'menunggu',
            ],
        ]);
    }
}
