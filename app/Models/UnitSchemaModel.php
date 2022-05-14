<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitSchemaModel extends Model
{ 
    protected $table = "unit_schema";
    protected $fillable = [
        'schema_id',
        'unit_id',
        'category_id'
       ];
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(CategoryModel::class);
    }
    public function schema()
    {
        return $this->belongsTo(SchemaModel::class);
    }
    public function unit()
    {
        return $this->belongsTo(UnitModel::class);
    }
    
    public function questions()
    {
        return $this->hasMany(Question::class, 'unit_id', 'id')->orderBy('no_soal');
    }
    
    public function pertanyaan_lisans()
    {
        return $this->hasMany(PertanyaanLisan::class, 'unit_id', 'id')->orderBy('no_soal');
    }
}
