<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AturanGejala extends Model
{
    use HasFactory;

    protected $table = 'aturan_gejala';
    protected $primaryKey = 'id_aturan';

    protected $fillable = [
        'id_gejala',
        'id_diagnosa',
    ];

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class, 'id_diagnosa', 'id_diagnosa');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'id_gejala', 'id_gejala');
    }
}
