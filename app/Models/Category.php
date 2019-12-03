<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'name',
    ];

    public function hasProducts(){
        return $this->hasMany('App\Models\Product');
    }
}
