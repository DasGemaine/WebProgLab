<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'color',
        'furniture_type',
        'image'
    ];
    
    
    protected $dates = [
        'deleted_at'
    ];

    public function scopeSearch($query){
        if(request('search')){
            return $query -> where('name', 'like', '%'.request('search'). '%')
                            ->orWhere('price', 'like', '%'.request('search'). '%')
                                ->orWhere('furniture_type', 'like', '%'.request('search'). '%')
                                     ->orWhere('color', 'like', '%'.request('search'). '%');
        }
    }
}
