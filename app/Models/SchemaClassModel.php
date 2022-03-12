<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchemaClassModel extends Model
{
    protected $table = "schema_class";
    protected $fillable = [
        'name',
        'description',
        'tuk',
        'event_id',
        'schema_id',
        'date'
       ];
    use HasFactory;
    use SoftDeletes;

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
}
