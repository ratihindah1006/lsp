<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d

class SchemaClassModel extends Model
{
    protected $table = "schema_class";
    protected $fillable = [
        'name',
        'description',
        'tuk',
        'event_id',
        'schema_id'
       ];
    use HasFactory;
<<<<<<< HEAD
=======
    use SoftDeletes;
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d

    public function event()
    {
        return $this->belongsTo(EventModel::class, 'event_id','id');
    }

    public function schema()
    {
        return $this->belongsTo(SchemaModel::class, 'schema_id','id');
    }

    public function assessors()
    {
        return $this->hasMany(AssessorModel::class, 'class_id', 'id'); 
    }

    public function assessis()
    {
        return $this->hasMany(AssessiModel::class, 'class_id', 'id'); 
    }
}
