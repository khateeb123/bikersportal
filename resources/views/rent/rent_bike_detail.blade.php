@extends('layouts.app')

@section('content')
@include('layouts.errors')
<div class="container">
	<div class="row">
		<div class=" col-md-5">
			<img class="rounded mt-5" src="{{ asset('storage/image') }}/{{$rentBike->image}}" alt="bike">
			<h3>{{$rentBike->name}}-{{$rentBike->modal}}</h3>
		</div>
		<div class="offset-1 col-md-4 text-justify">
			<h5  class="mt-5">
				<strong>{{$rentBike->description}}
				</strong>
			</h5>
			<h4 class="mt-3"><strong>${{$rentBike->rent}}.00</strong></h4>
			<h6><strong>Color</strong> : {{$rentBike->color}}</h6>
			<h6><strong>Discount</strong> : 0.00</h6>

			<form  action="{{ route('rent-bike-checkout', $rentBike->id) }}" method="POST">
				@csrf
				

			<div class="form-group">
				<label for="startDate">Start date</label>
				<input class="form-control" type="date" name="startDate" id="startDate">
				
			</div>
			<div class="form-group">
				<label for="endDate">End date</label>
				<input class="form-control" type="date" name="endDate" id="endDate">
				
			</div>
				<button type="submit"  class="btn btn-success ">Order 4 Rent 
					
				</button>
				</form>
		</div>
	</div>
</div>

@endsection