<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class DataAssessorModel extends Authenticatable
{
    use Notifiable;
 
    
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
