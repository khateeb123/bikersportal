@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		

		  @foreach ($products as $product)
            {{-- expr --}}

        <div class="col-md-4">
            <div class="product-info">
       <a href="{{ route('product-detail',$product->id) }}" style="text-decoration: none;color:black">
                <img class="img-fluid rounded-circle" src="{{ asset('storage/image') }}/{{$product->image}}" alt="product">
            </div>
                <p class="mt-3 text-justify">{{$product->description}}</p>
        </a>
        </div>

         @endforeach
         



	</div>
</div>

@endsection