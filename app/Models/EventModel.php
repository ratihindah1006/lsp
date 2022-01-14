<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $fillable = [
        'event_code',
        'event_name',
        'event_starts',
        'event_ends',
        'status',
        'type',
       ];
    use HasFactory;

    public function schema_class()
    {
        return $this->hasMany(SchemaClassModel::class, 'event_id', 'id'); 
    }

    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'admin_id', 'id');
    }
}

