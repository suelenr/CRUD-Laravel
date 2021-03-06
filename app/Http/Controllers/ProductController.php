<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index (Request $request){
        $products=Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*','categories.name as category_name')
            ->orderBy('products.name')
            ->paginate();
        return view('products.index',compact('products'));
    }

    public function create (){
        $categories=Category::all()->sortBy('name');
        return view('products.create',compact('categories'));
    }

    public function edit (Product $product){
        $categories=Category::all()->sortBy('name');
        return view('products.edit', compact('product','categories'));
    }

    public function store (Request $request){
        $values = $this->validate($request,[
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'photo' => 'sometimes|file|image',
        ]);

        $values['photo'] = $request->file('photo')->store('images',['disk'=>'public']);
        $product = Product::create($values);
        return redirect(route('products.index'))
            ->with('success', 'Product {$product->name} successfully created;');
    }

    public function update(Request $request, Product $product){
        $values = $this->validate($request,[
            'name' => ['required',Rule::unique('products')->ignoreModel($product)],
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'photo' => 'sometimes|file|image',
        ]);

        if($request->hasfile('photo')){
            if($product->photo){
                Storage::disk('public')->delete($product->photo);
            }
            $values['photo'] = $request->file('photo')->store('images',['disk'=>'public']);
        }

        $product->update($values);
         return redirect(route('products.index'))
         ->with(compact('product'))
         ->with('success','Product successfully updated.');
    }

    public function destroy (Product $product){
        $product->delete();
        if($product->photo){
            Storage::disk('public')->delete($product->photo);
        }
        return redirect()->back()
            ->with('success','Product successfully deleted.');
    }
    
    public function deletePhoto (Product $product){  
        dd($product->name);
        $product->update(['photo' => null]);
        Storage::disk('public')->delete($product->photo);

        return redirect()->back()
        ->with(compact('product'))
        ->with('success','Photo successfully deleted.');
    }

    public function search (Request $request){
        $search = $request->get('search');
        $product=Product::where('name', 'like' , '%'. $search. '%')->orderBy('name')->paginate();
 
        return view('products.index',['products'=>$product]);
    }

    
}

