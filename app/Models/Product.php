<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'name',
        'description',
        'price',
        'photo',
        //'category_id',
    ];

    public function getPhotoUrlAttribute(){
        if(isset($this->attributes['photo'])){
            return Storage::disk('public')->url($this->attributes['photo']);
        }
    } 

   /* public function hasCategory(){
        return $this->belongsTo('App\Models\Category');
    }*/
}
