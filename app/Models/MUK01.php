<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MUK01 extends Model
{
    use HasFactory;
    protected $table = "muk01";
    protected $fillable = [
        'assessi_id',
        'rekomendasi',
        'status',
        'assessi_agreement',
        'assessor_agreement',
    ];

    protected $casts = ['rekomendasi' => 'array'];

    public function assessi()
    {
        return $this->belongsTo(AssessiModel::class, 'assessi_id', 'id');
    }
}
