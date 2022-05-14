<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IA07 extends Model
{
    use HasFactory;
    protected $table = "ia07";
    protected $fillable = [
        'assessi_id',
        'status',
        'assessi_agreement',
        'assessor_agreement',
    ];

    public function assessi()
    {
        return $this->belongsTo(AssessiModel::class, 'assessi_id', 'id');
    }
}
