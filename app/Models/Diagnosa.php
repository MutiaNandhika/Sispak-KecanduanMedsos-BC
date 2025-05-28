<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $table = 'diagnosa'; 

    protected $primaryKey = 'id_diagnosa'; 

    protected $fillable = [
        'nama_diagnosa',
        'deskripsi',
        'status_verifikasi',
        'catatan_pakar',
    ];

    public function solusis()
    {
        return $this->hasMany(Solusi::class, 'id_diagnosa', 'id_diagnosa');
    }
}
