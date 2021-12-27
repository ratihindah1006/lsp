<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ElementModel extends Model
{   
    protected $fillable = [
        'element_code',
        'element_title',
        'unit_id',
        
       ];
    use HasFactory;
    use SoftDeletes;

    public function element()
    {
        return $this->belongsTo(UnitModel::class,'unit_id','id');
    }

    public function criterias()
    {
        return $this->hasMany(CriteriaModel::class, 'element_id', 'id'); 
    }
}
