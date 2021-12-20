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
        'name', 'email', 'password', 'schema_code', 'assessor_id', 'field_',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at'=>'datetime',
    ]; 

    public function assessi_assessor()
    {
        return $this->belongTo(AssessorModel::class);
    }

    public function assessi_category()
    {
        return $this->belongTo(CategoryModel::class);
    }
}
