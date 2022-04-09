<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;



class DataAssessorModel extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    
    protected $table = "data_assessor";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'email', 'password', 'no_met'
    ];
    public $timestamps = false;

    public function assessors()
    {
        return $this->hasMany(AssessorModel::class, 'data_assessor_id', 'id'); 
    }
}
