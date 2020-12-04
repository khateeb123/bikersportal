@extends('layouts.app')

@section('content')
@include('layouts.errors')
<div class="container">

	<div class="row">
		<div class=" col-md-5">
			<img class="rounded mt-5" src="{{ asset('storage/image') }}/{{$product->image}}" alt="bike">
			<h3>{{$product->name}}-{{$product->modal}}</h3>
		</div>
		<div class="offset-1 col-md-4 text-justify">
			<h5  class="mt-5">
				<strong>{{$product->description}}
				</strong>
			</h5>
			<h4 class="mt-3"><strong>${{$product->price}}</strong></h4>
			<h6><strong>Color</strong> : {{$product->color}}</h6>
			<h6><strong>Discount</strong> : 0.00</h6>

			<form  action="{{ route('add-to-cart', $product->id) }}" method="GET">
				@csrf
				

			<div class="form-group">
				<label for="quantity">Quantity</label>
				<select class="form-control" name="quantity" id="quantity" >
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
			</div>
				<button type="submit" name="buy" class="btn btn-outline-primary btn-block badge-pill">Buy it now 
					
				</button>
				<button type="submit" class="btn btn-success btn-block badge-pill">Add to cart</button>
				</form>
		</div>
	</div>
</div>

@endsection