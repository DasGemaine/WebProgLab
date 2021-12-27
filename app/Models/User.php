<?php

namespace App\Models;

use App\Models\Transaction;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'gender',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
