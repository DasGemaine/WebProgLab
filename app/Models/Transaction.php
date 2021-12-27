<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'method',
        'card_number',
        'cart_object'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'userID', 'id');
    }

    public function scopeTransaction($query){
        if(request('search')){
            return $query -> where('id', 'like', request('search'));
        }
    }
}
