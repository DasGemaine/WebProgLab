<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'itemID',
        'name',
        'qty',
        'price',
        'image'
    ];

    public function item(){
        return $this->belongsTo(Item::class, 'itemID', 'id');
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
