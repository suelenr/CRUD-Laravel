@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">PRODUCT LIST</div>

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
                        <th>Name</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th colspan="3" align="center">Actions</td>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-icon btn-xs" data-toggle="modal" data-target="#viewProduct">🔍</button>
                                            <button class="btn btn-icon btn-xs" onclick="window.location.href='{{ route('products.edit', $product) }}';">✎</button>
                                            <button class="btn btn-icon btn-xs" data-toggle="modal" data-target="#confirmDelete">❌</button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">DELETING</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete <b>{{$product->name}}</b>?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                                    </div>
                                    </div>
                                </div>
                                </div>
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