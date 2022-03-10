<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = "answer";

    protected $fillable = [
        'assessi_id',
        'unit_id',
        'answer',
        'rekomendasi',
        'status',
    ];

    public function assessi()
    {
        return $this->belongsTo(AssessiModel::class, 'assessi_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(UnitModel::class,'unit_id','id');
    }
}
