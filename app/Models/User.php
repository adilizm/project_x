<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role_id',
        'is_banned',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }
    public function Shop()
    {
        return $this->hasOne(Shop::class);
    }
    public function Manager()
    {
        return $this->hasOne(Manager::class);
    }
    public function Livreur()
    {
        return $this->hasOne(Livreur::class);
    }
    public function Vondeur()
    {
        return $this->hasone(Vondeur::class);
    }
    public function Orders()
    {
        return $this->hasMany(Order::class);
    }
}
