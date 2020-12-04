@extends('admin.admin_sidebar_app')


@section('admin_content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 mt-3">
				<h4><strong>Accessories</strong></h4>
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
				  <tr class="table-success">
				  
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