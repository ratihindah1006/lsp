<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UnitModel extends Model
{
    protected $table = "unit";
    protected $fillable = [
        'unit_code',
        'unit_title',
        'category_id'
       ];
    use HasFactory;
    

    public function category()
    {
        return $this->belongsTo(CategoryModel::class);
    }

    public function assessi()
    {
        return $this->belongsTo(AssessiModel::class);
    }

    public function elements()
    {
        return $this->hasMany(ElementModel::class, 'unit_id', 'id'); 
    }
    public function unit_schemas()
    {
        return $this->hasMany(UnitSchemaModel::class, 'unit_id', 'id'); 
    }
    public function answer()
    {
        return $this->hasMany(Answer::class, 'unit_id', 'id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'unit_id', 'id');
    }
}
