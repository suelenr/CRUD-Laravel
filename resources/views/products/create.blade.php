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
            <div class="card shadow"> 
                <div class="card-header">New Product</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" value="{{old('name')}}" name="name" class="form-control"/>
                            
                            <label>Description</label>
                            <textarea rows="6" name="description" class="form-control">{{old('description')}}</textarea>
                           
                            <label>Price</label>
                            <input type="text" value="{{old('price')}}" name="price" class="form-control"/>

                            <label>Image</label>
                            <input type="file" name="photo" class="form-control custom-file"/>
                        </div>
                        <button class="btn btn-primary">Save</button>
                        <a href="{{ route('products.index') }}" class="ml-auto btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection