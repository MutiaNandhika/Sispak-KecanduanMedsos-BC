<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan'; 
    protected $primaryKey = 'id_pertanyaan'; 
    public $timestamps = true; 

    protected $fillable = [
        'id_gejala',
        'pertanyaan_gejala',
        'status_verifikasi',
        'catatan_pakar',
    ];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'id_gejala', 'id_gejala');
    }

    public function gejalaTerdeteksi()
    {
        return $this->hasMany(HasilGejala::class, 'id_gejala', 'id_gejala');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'id_pertanyaan', 'id_pertanyaan');
    }

}
