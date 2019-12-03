<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index (Request $request){
        return view('categories.index',[
            'categories'=>Category::orderBy('name')->paginate(),
        ]);
    }

    public function create (){
        return view('categories.create');
    }
}
