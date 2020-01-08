<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'detail', 'category_id', 'slug', 'image'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
