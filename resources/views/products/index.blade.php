@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">Product List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('products.create') }}" class="ml-auto btn btn-primary">
                        New Product
                    </a>
                    </br></br>
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>N#</th>
                        <th>Name</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th colspan="3" align="center">Actions</td>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>@if($product->photo)
                                            <img src="{{ $product->photo_url }}" alt="{{ $product->name }}" class="rounded mg-fluid"/>
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <a class="icon" href="{{ url('/') }}"><img src="img/icons-view.png" alt="View Product" width="30" height="30"></a>
                                        <a class="icon" href="{{ url('/') }}"><img src="img/icons-edit.png" alt="Edit Product" width="30" height="30"></a>
                                        <a class="icon" href="{{ url('/') }}"><img src="img/icons-delete.png" alt="Delete Product" width="30" height="30"></a>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div> 
                <div class="mx-auto mt-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection