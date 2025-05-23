<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pertanyaan',
        'diagnosa_id',
    ];

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class);
    }
}
