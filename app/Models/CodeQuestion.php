<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeQuestion extends Model
{
    use HasFactory;

    protected $table = "code_question";

    protected $fillable = [
        'schema_id',
        'code_name',
    ];

    public function schema()
    {
        return $this->belongsTo(SchemaModel::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'code_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'code_id', 'id');
    }

    public function schema_class()
    {
        return $this->hasMany(SchemaClassModel::class, 'code_id', 'id'); 
    }
}
