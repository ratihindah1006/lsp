<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktik extends Model
{
    use HasFactory;

    protected $table = "praktik";

    protected $fillable = [
        'assessi_id',
        'code_praktik_id',
        'file_name',
        'file_path',
        'rekomendasi',
        'status',
        'keterangan',
        'catatan'
    ];

    public function assessi()
    {
        return $this->belongsTo(AssessiModel::class, 'assessi_id', 'id');
    }

    public function code_praktik()
    {
        return $this->belongsTo(CodePraktik::class,'code_praktik_id','id');
    }
}
