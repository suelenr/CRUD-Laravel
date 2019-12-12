<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index (Request $request){
        $categories=Category::all();
        return view('products.create',compact('categories'));
    }

    public function create (){
        return view('products.create',[
            'categories'=>Category::orderBy('name'),
        ]);
    }
}
