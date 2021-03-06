<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SchemaClassModel extends Model
{
    protected $table = "schema_class";
    protected $fillable = [
        'name',
        'description',
        'tuk',
        'event_id',
        'schema_id',
        'code_id',
        'code_lisan_id',
        'code_praktik_id',
        'date'
       ];
    use HasFactory;
 

    public function event()
    {
        return $this->belongsTo(EventModel::class, 'event_id','id');
    }

    public function schema()
    {
        return $this->belongsTo(SchemaModel::class, 'schema_id','id');
    }

    public function assessors()
    {
        return $this->hasMany(AssessorModel::class, 'class_id', 'id'); 
    }

    public function assessis()
    {
        return $this->hasMany(AssessiModel::class, 'class_id', 'id'); 
    }
    public function code()
    {
        return $this->belongsTo(CodeQuestion::class, 'code_id','id');
    }

    public function code_lisan()
    {
        return $this->belongsTo(CodeQuestionLisan::class, 'code_lisan_id','id');
    }

    public function code_praktik()
    {
        return $this->belongsTo(CodePraktik::class, 'code_praktik_id','id');
    }
}
