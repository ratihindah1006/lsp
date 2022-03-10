<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = "question";

    protected $fillable = [
        'element_id',
        'question',
        'key_answer'
    ];

    public function element()
    {
        return $this->belongsTo(ElementModel::class,'element_id','id');
    }
}
