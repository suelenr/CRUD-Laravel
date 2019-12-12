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
                    <table class="table table-bordered" align="center">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('products.update', $product) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <tr>
                                    <td><label>Name</label></td>
                                    <td><input type="text" value="{{ old('name') ?? $product->name }}" name="name" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td><label>Description</label></td>
                                    <td><textarea rows="6" name="description" class="form-control">{{ old('description') ?? $product->description }}</textarea></td>
                                </tr>
                                <tr>
                                    <td><label>Price</label></td>
                                    <td><input type="text" value="{{ old('price') ?? $product->price }}" name="price" onkeyup="onlyNumbers(this);" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td><label>Category</label></td>
                                    <td><input type="text" value="{{ old('category') ?? $product->category_name }}" name="category" class="form-control custom-file"/></td>
                                </tr>
                                <tr>
                                    <td colspan=2 align="right"><span><select name="category_span">
                                        @foreach($categories as $category)
                                            <option value="{{$category->name}}">{{$category->name}}</option>
                                        @endforeach
                                    </select></span></td>
                                </tr>
                                <tr>
                                    <td><label>Image</label></td>
                                    <td><input type="file" name="photo" class="form-control custom-file"/></td>
                                </tr>
                                <tr>
                                    @if($product->photo)
                                    <td colspan=2 align="center"><img src="{{ $product->photo_url }}" alt="{{ $product->name }}" class="rounded mg-fluid img-thumbnail""/>
                                    <a class="btn btn-icon btn-xs">Remove photo</a></td>
                                    @endif
                                    
                                </tr>
                            </div>
                                <tr>
                                    <td colspan=2 align="right"><button class="btn btn-primary">Update</button>
                                    <a href="{{ route('products.index') }}" class="ml-auto btn btn-secondary">Cancel</a>
                                </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
		function onlyNumbers(num) {
			var er = /[^0-9.]/;
			er.lastIndex = 0;
			var field = num;
			if (er.test(field.value)) {
			  field.value = "";
			}
		}
	</script>