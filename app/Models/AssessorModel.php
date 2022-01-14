<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class AssessorModel extends Authenticatable
{
    use Notifiable;
   
    protected $table = "assessor";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'email', 'password', 'field_id', 'schema_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at'=>'datetime',
    ]; 

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'field_id', 'id');
    }
    public function schema()
    {
        return $this->belongsTo(SchemaModel::class, 'schema_id', 'id');
    }

    public function assessis()
    {
        return $this->hasMany(AssessiModel::class, 'assessor_id', 'id'); 
    }
    public function schema_class()
    {
        return $this->belongsTo(SchemaClassModel::class, 'schema_id','id');
    }

}
