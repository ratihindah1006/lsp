<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APL02Model extends Model
{
    protected $table = "apl02";
    protected $fillable = [
        'assessi_id', 'note', 'assessment', 'transcript', 'work_exper_certif', 'status', 'lane', 'assessor_agreement'
    ];
    use HasFactory;

    public function assessi()
    {
        return $this->belongsTo(AssessiModel::class, 'assessi_id', 'id');
    }
    public function assessment()
    {
        return $this->hasOne(AssessmentModel::class,'apl02_id','id'); 
    }
}
