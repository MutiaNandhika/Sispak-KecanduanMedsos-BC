<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilDiagnosa extends Model
{
    protected $table = 'hasil_diagnosa';
    protected $primaryKey = 'id_hasil';
    public $timestamps = false;

    protected $fillable = [
        'id_diagnosa',
        'id_user',
    ];

    // Relasi opsional jika dibutuhkan
    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class, 'id_diagnosa');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
