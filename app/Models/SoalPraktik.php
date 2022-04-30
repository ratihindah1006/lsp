<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalPraktik extends Model
{
    use HasFactory;

    protected $table = "soal_praktik";

    protected $fillable = [
        'code_praktik_id',
        'instruksi',
    ];

    public function code()
    {
        return $this->belongsTo(CodePraktik::class,'code_praktik_id','id');
    }
}
