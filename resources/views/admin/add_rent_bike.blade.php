@extends('admin.admin_sidebar_app')


@section('admin_content')
@include('layouts.errors')
<div class="container mt-4">
	<ul>

</ul>
	
<form action="{{ route('store-rent') }}" method="POST" 	class="mt-2" enctype="multipart/form-data">
	@csrf
	
	<div class="form-group row">
		<label for="city" class="col-sm-2 col-form-label">City</label>
		<div class="col-sm-6">
			<select class="form-control" name="city_id" id="city">
				@foreach ($cities as $city)
				<option value="{{$city->id}}">{{$city->name}}</option>
				
				@endforeach
			</select>
		</div>
		
		<div class="col-sm-3">
					<button  type="button" class="btn btn-outline-primary badge-pill"
					 	data-toggle="modal" data-target="#newCity">
						Add new City +
					</button>
			</div>



	</div>

	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Name</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="name" id="name" placeholder="rent bike name">
		</div>
	</div>

	<div class="form-group row">
		<label for="description" class="col-sm-2 col-form-label">Description</label>
		<div class="col-sm-6">
			<textarea class="form-control" name="description" id="description" placeholder="rent bike description">
			</textarea>
		</div>
	</div>

	<div class="form-group row">
		<label for="rent" class="col-sm-2 col-form-label">Rent</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="rent" id="rent" placeholder="rent for bike">
		</div>
	</div>

	<div class="form-group row">
		<label for="color" class="col-sm-2 col-label-form">Color</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="color" id="color" placeholder="rent bike color">
		</div>	
	</div>

	<div class="form-group row">
		<label for="image" class="col-sm-2 col-from-label">Image</label>
		<div class="col-sm-6">
			<input type="file" class="form-control-file" name="image" id="image">
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-2"></div>
		<div class="col-sm-7">
			<button type="submit" class="btn btn-primary">Add rent bike</button>
		</div>
	</div>
</form>

<form method="POST" action="{{ route('store-city') }} " enctype="multipart/form-data">
		@csrf
		{{-- the model  --}}
	<div class="modal fade" id="newCity">
		<div class="modal-dialog">
			<div class="modal-content">
				{{-- model header --}}
				<div class="modal-header">
					<h5 class="modal-tital">create city</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="city" class="col-form-lable">City</label>
								<input  type="text" class="form-control" name="name" id="city">
								
							</div>

							<div class="form-group">
								<label for="Map" class="col-form-lable">Map</label>
								<input type="text" class="form-control" name="map" id="map">
							</div>
							<div class="form-group">
								<label for="image" class="col-form-lable">Image</label>
								<input type="file" class="form-control-file" name="image" id="image">
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