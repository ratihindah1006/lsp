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
        'data_assessor_id', 'class_id',
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
        return $this->belongsTo(SchemaClassModel::class, 'class_id','id');
    }

    public function data_assessor()
    {
        return $this->belongsTo(DataAssessorModel::class, 'data_assessor_id','id');
    }

}
