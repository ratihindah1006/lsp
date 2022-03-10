<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ElementModel extends Model
{   
    protected $table = "element";
    protected $fillable = [
        'element_code',
        'element_title',
        'unit_id',
<<<<<<< HEAD
        'benchmark',
=======
        
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d
       ];
    use HasFactory;
    use SoftDeletes;

    public function unit()
    {
        return $this->belongsTo(UnitModel::class,'unit_id','id');
    }

    public function criterias()
    {
        return $this->hasMany(CriteriaModel::class, 'element_id', 'id'); 
    }
<<<<<<< HEAD

    public function question()
    {
        return $this->hasOne(Question::class, 'element_id', 'id');
    }
=======
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d
}
