<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertanyaanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pertanyaan')->insert([
            [
                'id_pertanyaan' => 1,
                'id_gejala' => 1,
                'pertanyaan_gejala' => 'Menggunakan media sosial hanya saat waktu senggang?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => 'Pertanyaan sudah sesuai dengan tiap gejala',
                'created_at' => '2025-06-01 10:16:54',
                'updated_at' => '2025-06-01 11:45:32'
            ],
            [
                'id_pertanyaan' => 2,
                'id_gejala' => 2,
                'pertanyaan_gejala' => 'Tidak merasa gelisah saat tidak membuka media sosial?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:17:13',
                'updated_at' => '2025-06-01 12:09:39'
            ],
            [
                'id_pertanyaan' => 3,
                'id_gejala' => 3,
                'pertanyaan_gejala' => 'Tidak merasa harus tahu semua aktivitas orang lain di media sosial?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:17:30',
                'updated_at' => '2025-06-01 12:09:45'
            ],
            [
                'id_pertanyaan' => 4,
                'id_gejala' => 4,
                'pertanyaan_gejala' => 'Bisa berhenti menggunakan media sosial kapan pun?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:17:54',
                'updated_at' => '2025-06-01 12:10:17'
            ],
            [
                'id_pertanyaan' => 5,
                'id_gejala' => 5,
                'pertanyaan_gejala' => 'Sering membuka media sosial tanpa alasan jelas?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:18:11',
                'updated_at' => '2025-06-02 00:09:47'
            ],
            [
                'id_pertanyaan' => 6,
                'id_gejala' => 6,
                'pertanyaan_gejala' => 'Langsung mengecek media sosial begitu bangun tidur?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:18:33',
                'updated_at' => '2025-06-02 00:09:54'
            ],
            [
                'id_pertanyaan' => 7,
                'id_gejala' => 7,
                'pertanyaan_gejala' => 'Sering mengecek notifikasi meski tidak penting?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:18:55',
                'updated_at' => '2025-06-02 00:09:59'
            ],
            [
                'id_pertanyaan' => 8,
                'id_gejala' => 8,
                'pertanyaan_gejala' => 'Merasa kurang update jika tidak membuka media sosial dalam sehari?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:19:27',
                'updated_at' => '2025-06-02 00:10:06'
            ],
            [
                'id_pertanyaan' => 9,
                'id_gejala' => 9,
                'pertanyaan_gejala' => 'Menggunakan media sosial untuk menghindari masalah pribadi?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:19:40',
                'updated_at' => '2025-06-02 00:10:12'
            ],
            [
                'id_pertanyaan' => 10,
                'id_gejala' => 10,
                'pertanyaan_gejala' => 'Membuka media sosial saat sedang berkumpul dengan keluarga/teman?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => 'sudah sesuai',
                'created_at' => '2025-06-01 10:20:00',
                'updated_at' => '2025-06-02 00:10:24'
            ],
            [
                'id_pertanyaan' => 11,
                'id_gejala' => 11,
                'pertanyaan_gejala' => 'Merasa senang jika mendapat banyak like/komentar?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:20:18',
                'updated_at' => '2025-06-02 00:10:30'
            ],
            [
                'id_pertanyaan' => 12,
                'id_gejala' => 12,
                'pertanyaan_gejala' => 'Gagal mengurangi waktu online meskipun sudah mencoba?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:20:31',
                'updated_at' => '2025-06-02 00:10:36'
            ],
            [
                'id_pertanyaan' => 13,
                'id_gejala' => 13,
                'pertanyaan_gejala' => 'Mengabaikan pekerjaan atau tugas penting karena sibuk di media sosial?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:20:45',
                'updated_at' => '2025-06-02 00:10:43'
            ],
            [
                'id_pertanyaan' => 14,
                'id_gejala' => 14,
                'pertanyaan_gejala' => 'Sering marah/kesal saat dilarang membuka media sosial?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:21:05',
                'updated_at' => '2025-06-02 00:10:50'
            ],
            [
                'id_pertanyaan' => 15,
                'id_gejala' => 15,
                'pertanyaan_gejala' => 'Sulit fokus belajar/kerja karena ingin membuka media sosial?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:21:22',
                'updated_at' => '2025-06-02 00:10:56'
            ],
            [
                'id_pertanyaan' => 16,
                'id_gejala' => 16,
                'pertanyaan_gejala' => 'Merasa lebih nyaman hidup di media sosial daripada dunia nyata?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:21:56',
                'updated_at' => '2025-06-02 00:11:03'
            ],
            [
                'id_pertanyaan' => 17,
                'id_gejala' => 17,
                'pertanyaan_gejala' => 'Sering menggunakan media sosial hingga larut malam setiap hari?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:22:17',
                'updated_at' => '2025-06-02 00:11:09'
            ],
            [
                'id_pertanyaan' => 18,
                'id_gejala' => 18,
                'pertanyaan_gejala' => 'Merasa sangat cemas jika tidak bisa mengakses media sosial?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:22:33',
                'updated_at' => '2025-06-02 00:11:19'
            ],
            [
                'id_pertanyaan' => 19,
                'id_gejala' => 19,
                'pertanyaan_gejala' => 'Sering berkonflik dengan orang terdekat karena penggunaan media sosial?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:22:51',
                'updated_at' => '2025-06-02 00:11:25'
            ],
            [
                'id_pertanyaan' => 20,
                'id_gejala' => 20,
                'pertanyaan_gejala' => 'Lebih banyak waktu online daripada berinteraksi langsung di dunia nyata?',
                'status_verifikasi' => 'diterima',
                'catatan_pakar' => null,
                'created_at' => '2025-06-01 10:23:11',
                'updated_at' => '2025-06-02 00:11:33'
            ]
        ]);
    }
}
