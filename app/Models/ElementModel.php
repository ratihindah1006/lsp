<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementModel extends Model
{   
    protected $table = "element";
    protected $fillable = [
        'element_title',
        'no_element',
        'unit_id',
        'benchmark',
        'benchmark_url'
       ];
    use HasFactory;
    

    public function unit()
    {
        return $this->belongsTo(UnitModel::class,'unit_id','id');
    }

    public function criterias()
    {
        return $this->hasMany(CriteriaModel::class, 'element_id', 'id')->orderBy('no_criteria'); 
    }

    public function question()
    {
        return $this->hasOne(Question::class, 'element_id', 'id');
    }
}
