<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeQuestionLisan extends Model
{
    use HasFactory;
    protected $table = "code_question_lisan";

    protected $fillable = [
        'schema_id',
        'code_lisan_name',
    ];

    public function schema()
    {
        return $this->belongsTo(SchemaModel::class);
    }

    public function pertanyaan_lisan()
    {
        return $this->hasMany(PertanyaanLisan::class, 'code_lisan_id', 'id');
    }

    public function schema_class()
    {
        return $this->hasMany(SchemaClassModel::class, 'code_lisan_id', 'id'); 
    }

    public function answers()
    {
        return $this->hasMany(AnswerLisan::class, 'code_lisan_id', 'id');
    }
}
