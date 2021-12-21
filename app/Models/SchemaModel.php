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
        return $this->belongsTo(CategoryModel::class);
    }

    public function units()
    {
        return $this->hasMany(UnitModel::class, 'schema_id', 'id'); 
    }

}
