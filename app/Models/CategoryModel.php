<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryModel extends Model
{
    protected $fillable = [
        'category_code',
        'category_title',
       ];
    use HasFactory;
    use SoftDeletes;

    public function schema()
    {
        return $this->hasMany(SchemaModel::class, 'id_category', 'id'); 
    }
    
    public function schemas()
    {
        return $this->hasMany(SchemaModel::class, 'id_category', 'id'); 
    }


}