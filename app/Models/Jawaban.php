<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban';
    protected $primaryKey = 'id_jawaban';

    protected $fillable = [
        'id_user',
        'id_pertanyaan',
        'jawaban',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan', 'id_pertanyaan');
    }
}
