<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APL02Model extends Model
{
    protected $fillable = [
        'assessment'
    ];
    use HasFactory;

    public function assessor()
    {
        return $this->belongsTo(AssessorModel::class, 'assessor_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'field_id', 'id');
    }

    public function schema()
    {
        return $this->belongsTo(SchemaModel::class, 'schema_id', 'id');
    }

    public function apl01()
    {
        return $this->belongsTo(APL01Model::class, 'apl01_id', 'id');
    }

    public function units()
    {
        return $this->hasMany(UnitModel::class, 'schema_id', 'id'); 
    }
}
