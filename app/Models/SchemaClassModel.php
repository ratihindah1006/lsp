<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchemaClassModel extends Model
{
    protected $fillable = [
        'name',
        'description',
        'tuk',
        'event_id',
        'schema_id'
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
}
