<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment_id', 'value',
    ];

    public function apl02()
    {
        return $this->belongsTo(APL02Model::class, 'assessment_id', 'id');
    }
}
