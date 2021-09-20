<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Orderdetail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=['id'];

    public function Order(){
        return $this->belongsTo(Order::class);
    }

    public function Product(){
        return $this->belongsTo(Product::class);
    }
    public function Vondeur(){
        return $this->belongsTo(Vondeur::class);
    }
    
}
