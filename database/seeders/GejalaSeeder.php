<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('gejala')->insert([
            [
                'id_gejala' => 1,
                'nama_gejala' => 'Menggunakan media sosial hanya saat senggang',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:04:37',
                'updated_at' => '2025-06-01 11:41:13',
            ],
            [
                'id_gejala' => 2,
                'nama_gejala' => 'Tidak merasa gelisah saat tidak membuka media sosial',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:04:52',
                'updated_at' => '2025-06-01 11:41:56',
            ],
            [
                'id_gejala' => 3,
                'nama_gejala' => 'Tidak merasa harus selalu update tentang aktivitas orang lain',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:05:07',
                'updated_at' => '2025-06-01 12:02:57',
            ],
            [
                'id_gejala' => 4,
                'nama_gejala' => 'Bisa berhenti menggunakan media sosial kapan saja',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:05:30',
                'updated_at' => '2025-06-01 12:03:09',
            ],
            [
                'id_gejala' => 5,
                'nama_gejala' => 'Sering membuka media sosial tanpa tujuan jelas',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:05:52',
                'updated_at' => '2025-06-01 12:03:16',
            ],
            [
                'id_gejala' => 6,
                'nama_gejala' => 'Merasa perlu mengecek media sosial saat bangun tidur',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:06:03',
                'updated_at' => '2025-06-01 12:03:23',
            ],
            [
                'id_gejala' => 7,
                'nama_gejala' => 'Sering mengecek notifikasi meski tidak penting',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:06:14',
                'updated_at' => '2025-06-01 12:03:32',
            ],
            [
                'id_gejala' => 8,
                'nama_gejala' => 'Merasa kurang update jika tidak membuka media sosial',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:06:31',
                'updated_at' => '2025-06-01 12:03:38',
            ],
            [
                'id_gejala' => 9,
                'nama_gejala' => 'Menggunakan media sosial untuk menghindari masalah pribadi',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:06:42',
                'updated_at' => '2025-06-01 12:03:44',
            ],
            [
                'id_gejala' => 10,
                'nama_gejala' => 'Sering membuka media sosial saat sedang bersama keluarga/teman',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:06:58',
                'updated_at' => '2025-06-01 12:03:49',
            ],
            [
                'id_gejala' => 11,
                'nama_gejala' => 'Merasa senang jika mendapat banyak likes atau komentar',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:07:14',
                'updated_at' => '2025-06-01 12:04:46',
            ],
            [
                'id_gejala' => 12,
                'nama_gejala' => 'Gagal mengurangi waktu online meski sudah mencoba',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:07:22',
                'updated_at' => '2025-06-01 12:04:57',
            ],
            [
                'id_gejala' => 13,
                'nama_gejala' => 'Mengabaikan pekerjaan atau tugas karena media sosial',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:07:39',
                'updated_at' => '2025-06-01 12:05:03',
            ],
            [
                'id_gejala' => 14,
                'nama_gejala' => 'Sering merasa kesal jika dilarang membuka media sosial',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:07:54',
                'updated_at' => '2025-06-01 12:05:09',
            ],
            [
                'id_gejala' => 15,
                'nama_gejala' => 'Sulit fokus belajar atau bekerja karena keinginan membuka media sosial',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:08:08',
                'updated_at' => '2025-06-01 12:05:16',
            ],
            [
                'id_gejala' => 16,
                'nama_gejala' => 'Merasa lebih nyaman di media sosial dibanding dunia nyata',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:08:34',
                'updated_at' => '2025-06-01 12:05:22',
            ],
            [
                'id_gejala' => 17,
                'nama_gejala' => 'Menggunakan media sosial hingga larut malam hampir setiap hari',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:08:47',
                'updated_at' => '2025-06-01 12:05:29',
            ],
            [
                'id_gejala' => 18,
                'nama_gejala' => 'Merasa cemas berlebihan jika tidak bisa mengakses media sosial',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:09:00',
                'updated_at' => '2025-06-01 12:05:35',
            ],
            [
                'id_gejala' => 19,
                'nama_gejala' => 'Mengalami konflik serius dengan orang terdekat karena media sosial',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:09:23',
                'updated_at' => '2025-06-01 12:05:41',
            ],
            [
                'id_gejala' => 20,
                'nama_gejala' => 'Lebih banyak waktu di dunia maya daripada interaksi langsung',
                'status_verifikasi' => 'diterima',
                'created_at' => '2025-06-01 10:09:34',
                'updated_at' => '2025-06-01 12:05:46',
            ],
        ]);
    }
}
