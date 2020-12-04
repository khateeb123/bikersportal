@extends('admin.admin_sidebar_app')


@section('admin_content')
@include('layouts.errors')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 mt-3">
				<h4><strong>Bikes Inventory</strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table class="table table-hover mt-3">
					    <thead class="thead-dark">
					      <tr>
					        <th>Name</th>
					        <th>Model</th>
					        <th>Price</th>
					        <th>Quantity</th>
					        <th>Color</th>
					        <th>Created_at</th>
					        <th>Updated_at</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>

				@foreach ($bikes as $bike)
				  <tr class="table-primary">
					        <td>{{$bike->name}}</td>
					        <td>{{$bike->modal}}</td>
					        <td>{{$bike->price}}</td>
					        <td>{{$bike->quantity}}</td>
					        <td>{{$bike->color}}</td>
					        <td>{{$bike->created_at}}</td>
					        <td>{{$bike->updated_at}}</td>
					         <td>
					        	<a href="{{ route('edit-product', $bike->id) }}" class="btn btn-success">
					        		<i class="far fa-edit"></i>
					        	</a>
					        	<form action="{{ route('delete-product',$bike->id) }}" method="POST" style="display: inline">
					        		@method('DELETE')
					        		@csrf
					        	<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
					        	</button>
					        	</form>
					        </td>
					      </tr>
				@endforeach

					    
					     
					    </tbody>
			  		</table>
				</div>
				
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 mt-3">
				<h4><strong>Parts Inventory</strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table class="table table-hover mt-3">
					    <thead class="thead-dark">
					      <tr>
					        <th>Name</th>
					        <th>Model</th>
					        <th>Price</th>
					        <th>Quantity</th>
					        <th>Color</th>
					        <th>Created_at</th>
					        <th>Updated_at</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
					     	@foreach ($parts as $part)
				  <tr class="table-success">
					        <td>{{$part->name}}</td>
					        <td>{{$part->modal}}</td>
					        <td>{{$part->price}}</td>
					        <td>{{$part->quantity}}</td>
					        <td>{{$part->color}}</td>
					        <td>{{$part->created_at}}</td>
					        <td>{{$part->updated_at}}</td>
					         <td>
					        	<a href="{{ route('edit-product', $part->id) }}" class="btn btn-success">
					        		<i class="far fa-edit"></i>
					        	</a>
					        	<form action="{{ route('delete-product',$part->id) }}" method="POST" style="display: inline">
					        		@method('DELETE')
					        		@csrf
					        	<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
					        	</button>
					        	</form>
					        </td>
					      </tr>
				@endforeach
					    </tbody>
			  		</table>
				</div>
				
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 mt-3">
				<h4><strong>Accessories Inventory</strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table class="table table-hover mt-3">
					    <thead class="thead-dark">
					      <tr>
					        <th>Name</th>
					        <th>Model</th>
					        <th>Price</th>
					        <th>Quantity</th>
					        <th>Color</th>
					        <th>Created_at</th>
					        <th>Updated_at</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
					    	@foreach ($accessories as $accessory)
				  <tr class="table-secondary">
					        <td>{{$accessory->name}}</td>
					        <td>{{$accessory->modal}}</td>
					        <td>{{$accessory->price}}</td>
					        <td>{{$accessory->quantity}}</td>
					        <td>{{$accessory->color}}</td>
					        <td>{{$accessory->created_at}}</td>
					        <td>{{$accessory->updated_at}}</td>
					         <td>
					        	<a href="{{ route('edit-product', $accessory->id) }}" class="btn btn-success">
					        		<i class="far fa-edit"></i>
					        	</a>
					        	<form action="{{ route('delete-product',$accessory->id) }}" method="POST" style="display: inline">
					        		@method('DELETE')
					        		@csrf
					        	<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
					        	</button>
					        	</form>
					        </td>
					      </tr>
				@endforeach
					    </tbody>
			  		</table>
				</div>
				
			</div>
		</div>

		
		
	</div>
	

@endsection