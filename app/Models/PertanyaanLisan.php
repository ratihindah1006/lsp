<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanLisan extends Model
{
    use HasFactory;

    protected $table = "pertanyaan_lisan";

    protected $fillable = [
        'unit_id',
        'code_lisan_id',
        'no_soal',
        'question',
        'key_answer'
    ];

    public function unit()
    {
        return $this->belongsTo(UnitSchemaModel::class,'unit_id','id');
    }

    public function code()
    {
        return $this->belongsTo(CodeQuestionLisan::class,'code_lisan_id','id');
    }
}
