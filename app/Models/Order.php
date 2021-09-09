<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use HasFactory,SoftDeletes;

    public function Order_Details(){
        return $this->hasMany(Orderdetail::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
