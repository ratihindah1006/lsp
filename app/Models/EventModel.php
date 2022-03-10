<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
    use SoftDeletes;

    public function schema_class()
    {
        return $this->hasMany(SchemaClassModel::class, 'event_id', 'id'); 
    }

    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'admin_id', 'id');
    }
}

