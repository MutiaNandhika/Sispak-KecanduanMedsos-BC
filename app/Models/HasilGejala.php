<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilGejala extends Model
{
    protected $table = 'hasil_gejala';
    protected $primaryKey = 'id_hasil_gejala';
    public $timestamps = false;

    protected $fillable = [
        'id_hasil',
        'id_gejala',
    ];

    public function hasilDiagnosa()
    {
        return $this->belongsTo(HasilDiagnosa::class, 'id_hasil');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'id_gejala');
    }
}
