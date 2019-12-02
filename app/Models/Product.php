<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'name',
        'description',
        'price',
        'photo',
    ];

    public function getPhotoUrlAttribute(){
        if(isset($this->attributes['photo'])){
            return Storage::disk('public')->url($this->attributes['photo']);
        }
    }
}
