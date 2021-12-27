<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APl01Model extends Model
{
    protected $fillable = [
        'nik','name','domicile','place_of_birth','date_of_birth','gender','nationality','address',
        'last_education','comp_name','position','comp_address','comp_telp','comp_fax','comp_email',
        'sert_schema','assessment_purpose','ijazah','photo','ktp','transcript','assessi_signature',
    ];
    use HasFactory;

    public function assessi()
    {
        return $this->belongsTo(AssessiModel::class, 'assessi_id', 'id');
    }
}