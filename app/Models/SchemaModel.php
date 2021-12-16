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
        'id_category',
        'schema_id',
        'unit_id',
        'element_id'
       ];
    use HasFactory;
    use SoftDeletes;

    public function schema()
    {
        return $this->belongTo(CategoryModel::class);
    }

    public function unit()
    {
        return $this->hasMany(UnitModel::class, 'schema_id', 'id'); 
    }

    public function units()
    {
        return $this->hasMany(UnitModel::class, 'schema_id', 'id'); 
    }

}
