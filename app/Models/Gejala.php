<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejala';
    protected $primaryKey = 'id_gejala';
    protected $fillable = ['nama_gejala', 'status_verifikasi'];
    
    public function pertanyaans()
    {
        return $this->hasMany(Pertanyaan::class, 'id_gejala', 'id_gejala');
    }

    public function aturanGejala()
    {
        return $this->hasMany(AturanGejala::class, 'id_gejala', 'id_gejala');
    }

}
