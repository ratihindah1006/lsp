<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryModel extends Model
{
    protected $table = "category";
    protected $fillable = [
        'category_title',
        'jenis_standar',
        'no_skkni'
       ];
    use HasFactory;

    public function units()
    {
        return $this->hasMany(UnitModel::class, 'category_id', 'id'); 
    }

    public function assessis()
    {
        return $this->hasMany(AssessiModel::class, 'category_id', 'id'); 
    }
    
    public function assessors()
    {
        return $this->hasMany(AssessorModel::class, 'category_id', 'id'); 
    }

    public function unit_schemas()
    {
        return $this->hasMany(UnitSchemaModel::class, 'category_id', 'id'); 
    }


}