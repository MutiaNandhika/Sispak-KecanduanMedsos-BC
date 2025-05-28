<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solusi extends Model
{
    use HasFactory;

    protected $table = 'solusi'; 

    protected $primaryKey = 'id_solusi'; 

    protected $fillable = [
        'id_diagnosa',
        'solusi_diagnosa',
        'status_verifikasi',
        'catatan_pakar',
    ];

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class, 'id_diagnosa', 'id_diagnosa');
    }
}
