@extends('admin.admin_sidebar_app')

@section('admin_content')
@include('layouts.errors')
<div class="container mt-4">
	
	<form method="POST" action="{{ route('store-product') }}" class="mt-3" enctype="multipart/form-data">

		@csrf
		<div class="form-group row">
			<label for="category" class="col-sm-2 col-form-label">Category</label>
			<div class="col-sm-7">
				<select class="form-control" name="product_category_id" id="category">
@foreach ($productCategories as $productCategory)					

					<option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
					
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="subCategory" class="col-sm-2 col-form-label">Sub Category</label>
			<div class="col-sm-7">
				<select class="form-control" name="sub_category_id" id="subCategory">
					@foreach ($subCategories as $subCategory)					

					<option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
					
					@endforeach
				</select>
			</div>
			<div class="col-sm-3">
					<button  type="button" class="btn btn-outline-primary badge-pill"
					 	data-toggle="modal" data-target="#newSubSategory">
						Add new sub category
					</button>
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="name" id="name" placeholder="product name">
			</div>
		</div>
		<div class="form-group row">
			<label for="modal" class="col-sm-2 col-form-label">modal</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="modal" id="modal" placeholder="product modal">
			</div>
		</div>


		<div class="form-group row">
			<label for="description" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-7">
				<textarea class="form-control" name="description" id="description" 
					placeholder="product description">
				</textarea>
			</div>
		</div>
		<div class="form-group row">
			<label for="price" class="col-sm-2 col-form-label">Price</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="price" id="price" placeholder="product price">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="quantity" id="quantity" placeholder="product quantity">
			</div>
		</div>
		<div class="form-group row">
			<label for="color" class="col-sm-2 col-form-label">Color</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="color" id="color" placeholder="product color">
			</div>
		</div>
		<div class="form-group row">
			<label for="image" class="col-sm-2 col-form-label">Image</label>
			<div class="col-sm-7">
				<input type="file" class="form-control-file" name="image" id="image">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-7">
				<button type="submit" class="btn btn-primary">Add product</button>
			</div>
		</div>
	</form>

	<form method="POST" action="{{ route('add-sub-category') }}">
		@csrf
		{{-- the model  --}}
	<div class="modal fade" id="newSubSategory">
		<div class="modal-dialog">
			<div class="modal-content">
				{{-- model header --}}
				<div class="modal-header">
					<h5 class="modal-tital">add new sub category</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="category" class="col-form-lable">categoy</label>
								<select class="form-control" name="product_category_id" id="categoy">
									@foreach ($productCategories as $productCategory)
										
									<option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="name" class="col-form-lable">name</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="enter sub category name ">
							</div>
						</div>

						{{-- model footer --}}
						<div class="modal-footer">
							<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success" > + Add  
								
							</button>
						</div>
			</div>
		</div>
	</div>
	</form>
</div>

@endsection