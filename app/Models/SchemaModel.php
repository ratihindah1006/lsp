<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class SchemaModel extends Model
{
    protected $table = "schema";
    protected $fillable = [
        'schema_title',
        'schema_code',
        'cost',
        'requirement',
        'competency_package'
       ];
    use HasFactory;
   

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id', 'id');
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
    public function schemaClass()
    {
        return $this->hasMany(SchemaClassModel::class, 'schema_id', 'id'); 
    }
    public function codes()
    {
        return $this->hasMany(CodeQuestion::class, 'schema_id', 'id'); 
    }
    public function unit_schemas()
    {
        return $this->hasMany(UnitSchemaModel::class, 'schema_id', 'id'); 
    }

}
