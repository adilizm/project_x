<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=['id'];

    public function Child_categoreis(){
        return $this->hasMany(Category::class,'parent_id');
    }
   /*  public function Parent_category(){
        return $this->belongsTo(Category::class,'id');
    } */
    public function Products(){
        return $this->hasMany(Product::class);
    }
}
