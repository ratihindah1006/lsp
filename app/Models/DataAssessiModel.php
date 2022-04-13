<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;



class DataAssessiModel extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    
    protected $table = "data_assessi";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'email', 'password', 
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at'=>'datetime',
    ]; 


    public function assessis()
    {
        return $this->hasMany(AssessiModel::class, 'data_assessi_id', 'id'); 
    }
}
