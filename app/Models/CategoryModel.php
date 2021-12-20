<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryModel extends Model
{
    protected $fillable = [
        'category_code',
        'category_title',
        'field_code',
        'field_title'
       ];
    use HasFactory;
    use SoftDeletes;

    public function schemas()
    {
        return $this->hasMany(SchemaModel::class, 'field_id', 'id'); 
    }

    public function assessis()
    {
        return $this->hasMany(AssessiModel::class, 'field_id', 'id'); 
    }
    
    public function assessors()
    {
        return $this->hasMany(AssessorModel::class, 'field_id', 'id'); 
    }


}