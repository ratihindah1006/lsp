<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SchemaModel extends Model
{
    protected $fillable = [
        'schema_code',
        'schema_title',
        'reference_number',
        'field_id',
        'schema_id',
       ];
    use HasFactory;
    use SoftDeletes;

    public function schema()
    {
        return $this->belongsTo(CategoryModel::class, 'field_id', 'id');
    }

    public function units()
    {
        return $this->hasMany(UnitModel::class, 'schema_id', 'id'); 
    }
    public function assessors()
    {
        return $this->hasMany(AssessorsModel::class, 'schema_id', 'id'); 
    }
    public function assessis()
    {
        return $this->hasMany(AssessiModel::class, 'schema_id', 'id'); 
    }
}
