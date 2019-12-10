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
                <div class="card-header">NEW PRODUCT</div>
                <div class="card-body">
                    <table class="table table-bordered" align="center">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
                            @csrf
                            <div class="form-group">
                                <tr>
                                    <td><label>Name</label></td>
                                    <td><input type="text" value="{{old('name')}}" name="name" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td><label>Description</label></td>
                                    <td><textarea rows="6" name="description" class="form-control">{{old('description')}}</textarea></td>
                                </tr>
                                <tr>
                                    <td><label>Price</label></td>
                                    <td><input type="text" value="{{old('price')}}" name="price" onkeyup="onlyNumbers(this);" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td><label>Category</label></td>
                                    <td><input type="text" value="{{old('category')}}" name="category" class="form-control custom-file"/></td>
                                </tr>
                                <tr>
                                    <td><span><select name="category_span" style="max-width:350px;"></select></span></td>
                                </tr>
                                <tr>
                                    <td><label>Image</label></td>                         
                                    <td><input type="file" name="photo" id="input-file" class="form-control custom-file" accept="image/*"/></td>
                                </tr>
                            </div>
                            <tr>
                                <td colspan=2 align="right"><button class="btn btn-primary">Save</button>
                                <a href="{{ route('products.index') }}" class="ml-auto btn btn-secondary">Cancel</a></td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
	
<!--===============================================================================================-->
    <script src="{{ asset('js/select2.min.js') }}" defer></script>
    <script src="{{ asset('js/select-togglebutton.js') }}" defer></script>
	
	<script type="text/javascript" >
		$(document).ready(function() {
			$('select').togglebutton();
		})		
	</script>

	<script>
		$("select[name='category_span']").change(function() {
			$("input[name='category']").eq($(this).index()).val(this.value);
		})
	</script>

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