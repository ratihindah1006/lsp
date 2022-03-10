<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

=======
use Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d
class EventModel extends Model
{
    protected $table = "event";
    protected $fillable = [
        'event_code',
        'event_name',
        'event_time',
        'status',
        'type',
        'admin_id'
       ];
    use HasFactory;
<<<<<<< HEAD
=======
    use SoftDeletes;
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d

    public function schema_class()
    {
        return $this->hasMany(SchemaClassModel::class, 'event_id', 'id'); 
    }

    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'admin_id', 'id');
    }
}

