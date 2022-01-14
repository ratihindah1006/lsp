<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CriteriaModel extends Model
{ 
    protected $table = "criteria";
    protected $fillable = [
    'criteria_code',
    'criteria_title',
    'element_id'
   ];
use HasFactory;
use SoftDeletes;

public function criteria()
{
    return $this->belongsTo(ElementModel::class, 'element_id','id');
}
}
