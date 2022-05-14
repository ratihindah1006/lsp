<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerLisan extends Model
{
    use HasFactory;

    protected $table = "answer_lisan";

    protected $fillable = [
        'assessi_id',
        'unit_id',
        'code_lisan_id',
        'answer',
        'rekomendasi',
        'status',
    ];

    public function assessi()
    {
        return $this->belongsTo(AssessiModel::class, 'assessi_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(UnitModel::class,'unit_id','id');
    }

    public function code_lisan()
    {
        return $this->belongsTo(CodeQuestionLisan::class,'code_lisan_id','id');
    }
}
