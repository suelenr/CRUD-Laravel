<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Storage;

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

    public function edit (Product $product){
        return view('products.edit', compact('product'));
    }

    public function delete (Product $product){
        return view('products.delete', compact('product'));
    }

    public function store (Request $request){
        $values = $this->validate($request,[
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'sometimes|file|image',
        ]);

        $values['photo'] = $request->file('photo')->store('images',['disk'=>'public']);
        $product = Product::create($values);
        return redirect(route('products.index'))->with('success', 'Product {$product->name} successfully created;');
    }

    public function update(Request $request, Product $product){
        $values = $this->validate($request,[
            'name' => ['required',Rule::unique('products')->ignoreModel($product)],
            'description' => 'required',
            'price' => 'required',
            'photo' => 'sometimes|file|image',
        ]);

        if($request->hasfile('photo')){
            if($product->photo){
                Storage::disk('public')->delete($product->photo);
            }
            $values['photo'] = $request->file('photo')->store('images',['disk'=>'public']);
        }

        $product->update($values);
         return redirect()->back()
         ->with(compact('product'))
         ->with('success','Product successfully updated.');
    }
}
