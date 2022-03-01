<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class DataAssessiModel extends Authenticatable
{
    use Notifiable;
    
    protected $table = "data_assessi";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'email', 'password', 
    ];
    public $timestamps = false;

    public function assessis()
    {
        return $this->hasMany(AssessiModel::class, 'data_assessi_id', 'id'); 
    }
}
