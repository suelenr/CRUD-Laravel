<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index (Request $request){
        return view('products.create',[
            'categories'=>Category::orderBy('name'),
        ]);
    }

    public function create (){
        return view('products.create',[
            'categories'=>Category::orderBy('name'),
        ]);
    }
}
