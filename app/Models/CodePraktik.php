<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodePraktik extends Model
{
    use HasFactory;
    protected $table = "code_praktik";

    protected $fillable = [
        'schema_id',
        'code_praktik_name',
    ];

    public function schema()
    {
        return $this->belongsTo(SchemaModel::class);
    }

    public function soal_praktik()
    {
        return $this->hasOne(SoalPraktik::class, 'code_praktik_id', 'id');
    }

    public function schema_class()
    {
        return $this->hasMany(SchemaClassModel::class, 'code_praktik_id', 'id'); 
    }

    public function answer_praktik()
    {
        return $this->hasMany(Praktik::class, 'code_praktik_id', 'id');
    }
}
