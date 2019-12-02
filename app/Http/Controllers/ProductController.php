<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index (Request $request){
        return view('products.index',[
            'products'=>Product::orderBy('name')->paginate(),
        ]);
    }

    public function create (){
        return view('products.create');
    }

    public function store (Request $request){
        $values = $this->validate($request,[
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required',
        ]);

        $values['photo'] = $request->file('photo')->store('images',['disk'=>'public']);
        $product = Product::create($values);
        return redirect(route('products.index'))->with('success', 'Product {$product->name} successfully created;');
    }

    public function edit (Product $product){
        return view('products.edit', compact('product'));
    }

    public function delete (){
        return view('products.delete');
    }
}
