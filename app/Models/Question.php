<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = "question";

    protected $fillable = [
        'unit_id',
        'code_id',
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
        return $this->belongsTo(CodeQuestion::class,'code_id','id');
    }
}
