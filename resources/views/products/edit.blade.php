@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->any())
                <div class='alert alert-danger'>
                    @foreach($errors->all() as $error)
                        <ul><li>{{ $error }}</li></ul>
                    @endforeach
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card shadow">
            <div class="card-header">EDITING <b>{{ $product->name }}</b></div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('products.update', $product) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" value="{{ old('name') ?? $product->name }}" name="name" class="form-control"/>
                            
                            <label>Description</label>
                            <textarea rows="6" name="description" class="form-control">{{ old('description') ?? $product->description }}</textarea>
                           
                            <label>Price</label>
                            <input type="text" value="{{ old('price') ?? $product->price }}" name="price" class="form-control"/>

                            <!--<label>Category</label>
                            <input type="file" value="{{ old('category') ?? $product->category }}" name="category" class="form-control custom-file"/>-->

                            <label>Image</label>
                            <input type="file" name="photo" class="form-control custom-file"/>
                            @if($product->photo)
                                <img src="{{ $product->photo_url }}" alt="{{ $product->name }}" class="rounded mg-fluid img-thumbnail""/>
                            @endif
                        </div>
                        <button class="btn btn-primary">Update</button>
                        <a href="{{ route('products.index') }}" class="ml-auto btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection