@extends('layouts.app')

@section('content')
	<div style=" 
	background-image: url('{{ asset('images/bikerent.jpg') }}');
	background-size: cover;
	background-position: top top ;
	height: 612px;">
		<div style="background: rgba(0,0,0,.5); width: ; height: 100%">
      @include('layouts.errors')
   

 			<div class="container col-md-offset-4 text-center">
  			<br>
 				<h1 class="text-white" style="font-size: 40px">WELCOME</h1>
				<h1 class="text-white "> Quick and easy online
				<span class="text-warning  "><strong>bike  rental</strong></span> 
				platform!
				</h1>

  			<form method="POST" action="{{ route('rent-bike-city') }}" 
  				class="form-inline justify-content-center align-items-center ">
    			@csrf
   				<select  class="btn-lg" name="city_id">
@foreach ($cities as $city)
              <option value="{{$city->id}}">{{$city->name}}</option>
@endforeach
                   
           
          </select>
  				<button type="submit" style="background-color: #FFA405" 
  					class="btn btn-lg ml-2 px-4">
  					Go
  				</button>
</form>

</div>
</div>
</div>
@endsection