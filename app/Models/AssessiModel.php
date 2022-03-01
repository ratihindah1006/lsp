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
        'data_assessi_id', 'assessor_id', 'class_id',
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

    public function schema()
    {
        return $this->belongsTo(SchemaModel::class, 'schema_id', 'id');
    }

    public function apl01()
    {
        return $this->hasOne(Apl01::class,'assessi_id','id'); 
    }
    public function apl02()
    {
        return $this->hasOne(Apl02Model::class,'assessi_id','id'); 
    }

    public function schema_class()
    {
        return $this->belongsTo(SchemaClassModel::class, 'class_id','id');
    }
    public function data_assessi()
    {
        return $this->belongsTo(DataAssessiModel::class, 'data_assessi_id','id');
    }

}
