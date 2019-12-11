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
                    <table>
                        <tr>
                            <td><a href="{{ route('products.create') }}" class="ml-auto btn btn-primary">New</a></td>
                            <td><a href="{{ route('products.index') }}" class="ml-auto btn btn-primary" id="btnImport" data-toggle="modal" data-target="#importProductModal">Import</a></td>
                        <form action="/search" method="get">
                            <td width="520px" align="right"><input type="search" name="search" vale="Product name" class="form-control form-control-sm"/></td>
                            <td width="80px" align="right"><span class="form-group-btn"><button type="submit" class="btn btn-primary">Search</button></span></td>
                            <td align="right"><a href="{{ route('products.index') }}" class="ml-auto btn btn-outline-secondary">Clean</a></td>
                        </form>
                        </tr>
                    </table>
                    </br></br>
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Name</th>
                        <th>Preço</th>
                        <th>Category</th>
                        <th colspan="3" align="center">Actions</td>
                        </thead>
                        <tbody>
                            @foreach($products as $product)   
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>                                    
                                    <td>{{ $product->category_name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-icon btn-xs" data-toggle="modal" data-target="#viewProduct{{$product->id}}">🔍</button>
                                            <button class="btn btn-icon btn-xs" onclick="window.location.href='{{ route('products.edit', $product) }}';">✎</button>
                                            <button class="btn btn-icon btn-xs" data-toggle="modal" data-target="#confirmDelete{{$product->id}}">❌</button>
                                        </div>
                                    </td>
                                </tr>

                                 <!-- Modal Import -->
                                 <div class="modal fade" id="importProductModal" tabindex="-1" role="dialog" aria-labelledby="importProductModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="importProductModalLabel">UPLOAD CSV</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <div id="drag-and-drop-zone" class="dm-uploader p-5">	
                                        <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
                                            <li class="text-muted text-center empty"><h4 class="mt-4 mb-5 text-muted">Drop or click in input to upload a CSV file</h4></li>
                                        </ul>
                                    </div>
                                    <input type="file" name="file" id="input-file-zone" accept=".csv" class="form-control form-control-file"/>
                                    </div>
                                    <div class="modal-footer">   
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <!-- Modal View -->
                                <div class="modal fade" id="viewProduct{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="viewProductLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewProductLabel">VIEWING</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $product->name }}" disabled/>
                                        
                                        <label>Description</label>
                                        <textarea rows="6" class="form-control" name="description" disabled>{{ $product->description }}</textarea>
                                    
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price" value="{{ $product->price }}" disabled/>

                                        <label> Category</label>
                                        <input type="text" class="form-control" name="category" value="{{ $product->category_name }}" disabled/>

                                        <label>Image</label></br>
                                        @if($product->photo)
                                            <img src="{{ $product->photo_url }}" alt="{{ $product->name }}" class="rounded mg-fluid img-thumbnail" id="product_image"/>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="confirmDelete{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
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

<script type="text/html" id="files-template">
	<li class="media">
		<div class="media-body mb-1">
		  <p class="mt-2">
			<strong>%%filename%%</strong> - Status: <span class="text-muted">Waiting</span>
		  </p>
		  <div class="progress mb-2">
			<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
			  role="progressbar"
			  style="width: 0%" 
			  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
			</div>
		  </div>
		  <hr class="mt-1 mb-1" />
		</div>
	</li>
  </script>