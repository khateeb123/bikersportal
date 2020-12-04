@extends('layouts.app')

@section('content')
@include('layouts.errors')
<div class="container">

    <div class="mt-5 text-center">
        <h2>Currently Featured Bikes</h2>
        <p class="text-muted">Here's what we are currently excited about at Bikers Portal.</p>
        <br /> <br />
    </div>
    <div class="row">
       

        @foreach ($bikes as $bike)
            {{-- expr --}}

        <div class="col-md-4">
            <div class="product-info">
       <a href="{{ route('product-detail',$bike->id) }}" style="text-decoration: none;color:black">
                <img class="img-fluid rounded-circle" src="{{ asset('storage/image') }}/{{$bike->image}}" alt="bike">
        </a>
            </div>
                <p class="mt-3 text-justify">{{$bike->description}}</p>
        </a>
        </div>

         @endforeach
    </div>
    <div class="mt-5 text-center">
        <h2>Currently Featured Parts</h2>
        <p class="text-muted">Here's what we are currently excited about at Bikers Portal.</p>
        <br /> <br />
    </div>
    <div class="row">
        
       
        @foreach ($parts as $part)
            {{-- expr --}}

        <div class="col-md-4">
            <div class="product-info">
       <a href="{{ route('product-detail',$part->id) }}" style="text-decoration: none;color:black">
                <img class="img-fluid rounded-circle" src="{{ asset('storage/image') }}/{{$part->image}}" alt="part">
        </a>
            </div>
                <p class="mt-3 text-justify">{{$part->description}}</p>
        </div>

         @endforeach
    </div>
    <div class="mt-5 text-center">
        <h2>Currently Featured Accessories</h2>
        <p class="text-muted">Here's what we are currently excited about at Bikers Portal.</p>
        <br /> <br />
    </div>
    <div class="row">
       
       
        @foreach ($accessories as $accessory)
            {{-- expr --}}

        <div class="col-md-4">
            <div class="product-info">
       <a href="{{ route('product-detail',$accessory->id) }}" style="text-decoration: none;color:black">
                <img class="img-fluid rounded-circle" src="{{ asset('storage/image') }}/{{$accessory->image}}" alt="accessory">
        </a>
            </div>
                <p class="mt-3 text-justify">{{$accessory->description}}</p>
        </div>

         @endforeach
    </div>
    <div class="mt-5 text-center">
        <h2>Rented Bikes</h2>
        <p class="text-muted">Here's what we are currently excited about at Bikers Portal.</p>
        <br /> <br />
    </div>
    <div class="row mb-5">
        <div class="offset-3 col-md-6">
            <div class="product-info">
                <a href="{{ route('rent') }}">
                    <img class="img-fluid rounded-circle" src="images/r.jpg" alt="bike">
                </a>
            </div>
                <p class="mt-3 text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
    </div>
</div>

<footer class="text-white" style="background-color:rgb(75, 71, 109);">
    <div class="row" style="padding: 90px;">
        <div class="col-md-8">
            <img class="img-fluid rounded" src="images/logo.jpg" 
                alt="logo" style="width: 48px; height: 60px;">
                <h2 class="ml-2" style="display: inline;"><strong>Bikers Portal</strong></h2>
                <p class="mt-3 text-justify">This is an online Bike and bike parts store that has listings of various bike along with their features.The system allows user to buy bike, bike parts and inventory online through credit card payment. This system also consists of ‘Rent a Bike’ feature where user can ask admin for bike on rent.</p>
        </div>

        <div class="col-md-4 text-center">
                <h1><strong>Location</strong></h1>
                <h4><strong>Lahore <br /> Gulberg III Cantt.</strong></h4>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <p class="text-center">Copyright © 2017 Bikers Portal.<p>
        </div>
    </div>
</footer>

@endsection