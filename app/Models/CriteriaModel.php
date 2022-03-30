<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaModel extends Model
{ 
    protected $table = "criteria";
    protected $fillable = [
    'no_criteria',
    'criteria_title',
    'element_id'
   ];
use HasFactory;


public function element()
{
    return $this->belongsTo(ElementModel::class, 'element_id','id');
}
}
