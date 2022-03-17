<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitModel extends Model
{
    protected $table = "unit";
    protected $fillable = [
        'unit_code',
        'unit_title',
        'schema_id'
       ];
    use HasFactory;
    use SoftDeletes;

    public function schema()
    {
        return $this->belongsTo(SchemaModel::class);
    }

    public function assessi()
    {
        return $this->belongsTo(AssessiModel::class);
    }

    public function elements()
    {
        return $this->hasMany(ElementModel::class, 'unit_id', 'id'); 
    }

    public function answer()
    {
        return $this->hasMany(Answer::class, 'unit_id', 'id');
    }
}
