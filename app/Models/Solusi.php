<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Diagnosa;

class Solusi extends Model
{
    use HasFactory;

    protected $fillable = ['diagnosa_id', 'solusi'];

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class);
    }
}
