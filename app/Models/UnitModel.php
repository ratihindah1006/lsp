<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitModel extends Model
{
    protected $fillable = [
        'unit_code',
        'unit_title',
        'schema_id'
       ];
    use HasFactory;
    use SoftDeletes;

    public function unit()
    {
        return $this->belongTo(SchemaModel::class);
    }

    public function elements()
    {
        return $this->hasMany(ElementModel::class, 'unit_id', 'id'); 
    }
}
