<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apl01 extends Model
{
    protected $table = "apl01";
    protected $primaryKey = "id";
    protected $fillable = [
        'assessi_id', 'nik','name','domicile','place_of_birth','date_of_birth','gender','nationality','address','email','no_hp',
        'last_education','comp_name','job_title','position','comp_address','comp_telp','comp_fax','comp_email',
        'postal_code','sert_schema','assessment_purpose','ijazah','photo','ktp','transcript','work_exper_certif','assessi_signature',
        'note','status'
    ];
  
    use HasFactory;

    public function assessi()
    {
        return $this->belongsTo(AssessiModel::class, 'assessi_id', 'id');
    }
}