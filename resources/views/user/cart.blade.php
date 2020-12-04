@extends('layouts.app')


@section('content')
@include('layouts.errors')
@php
	$total=0
@endphp
	<div class="container mt-4">
		<div class="row">
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-12">

						<h4><strong>Shopping Cart</strong></h4>
						@if (session('cart'))
							{{-- expr --}}
						<div class="table-responsive">
							<table class="table table-hover">
							    <thead>
							      <tr>
							        <th>product</th>

							        <th>Name</th>
							      
							        <th>Price</th>
							        <th>Quantity</th>
							        <th>remove</th>
							        
							      </tr>
							    </thead>
							    <tbody>
			
			
				@foreach (session('cart') as $id =>  $product)
							    
							      <tr>
							      	<td>
							      		
							      	<img  width="120" src="{{ asset('storage/image') }}/{{$product['image']}}" alt="">
							      	</td>
							        <td>{{$product['name']}}</td>
							        
							        <td>${{$product['price']}}</td>
							        <td>{{$product['quantity']}}</td>
							        <td><a href="{{ route('delete-cart-item',$id) }}" class="btn btn-outline-danger"> <i class="fas fa-trash"></i></a></td>
							       
							      </tr>
							      @php
							      	$total+=$product['price']*$product['quantity']
							      @endphp
							    @endforeach			    
							    
							    @php
							      	session()->put('total',$total)
							    @endphp
							    
							    </tbody>


					  		</table>
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						<h6 class="mt-3">Subtotal<span class="float-right">${{$total}}</span></h6>
						<h6>Shipping<span class="float-right">0.00</span></h6>
						<h6>Discount<span class="float-right">0.00</span></h6> <hr />
						<h4>Total<span class="float-right">${{$total}}</span></h4>
						<br>
						<a href="{{ route('checkout') }}" class="btn btn-success btn-block">
							Checkout
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection