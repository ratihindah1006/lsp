<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class AssessiModel extends Authenticatable
{
    use Notifiable;
    
    protected $table = "assessi";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'email', 'password', 'assessor_id', 'field_id',
    ];

    //protected $guard = "schema_code";
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at'=>'datetime',
    ]; 

    public function assessor()
    {
        return $this->belongsTo(AssessorModel::class, 'assessor_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'field_id', 'id');
    }

}
