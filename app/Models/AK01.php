<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AK01 extends Model
{
    use HasFactory;

    protected $table="ak01";
    protected $fillable = [
        'assessi_id',
        'tl_verif_porto',
        't_p_tulis',
        't_p_lisan',
        't_p_wawancara',
        'l_obs_langsung',
        'status',
        'tuk',
    ];

    public function assessi()
    {
        return $this->belongsTo(AssessiModel::class, 'assessi_id', 'id');
    }
}
