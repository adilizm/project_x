<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=['id'];

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function Images()
    {
        return $this->hasmany(ProductImage::class);
    }
    
}
