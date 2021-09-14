<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=['id'];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function City(){
        return $this->belongsTo(City::class);
    }
}
