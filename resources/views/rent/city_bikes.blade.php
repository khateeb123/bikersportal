@extends('layouts.app')

@section('content')
  <div style=" 
  background-image: url('{{ asset('storage/image/') }}/{{$city->image}}');
  background-size: cover;
  background-position: center center ;
  height: 612px;">
    <div style="background: rgba(0,0,0,.5); width: ; height: 100%">
<div class="container">
	<div class="row">

			
        @foreach ($rentBikes as $rentBike)
            {{-- expr --}}

        <div class="col-md-4 " style="margin-top: 170px">
            <div class="">
       <a class="" href="{{ route('rent-bike-detail',$rentBike->id) }}" style="text-decoration: none;color:black">
                <img class="img-fluid" src="{{ asset('storage/image') }}/{{$rentBike->image}}" alt="bike">
                <div class=" text-center text-white" style=" height: 20%">${{$rentBike->rent}}/Day  </div>
        </a>
            </div>
                
    
        </div>

         @endforeach



	
	</div>   
</div>

</div>
</div>
@endsection