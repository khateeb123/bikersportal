@extends('layouts.app')
@section('content')
@include('layouts.errors')

<div class="container">
<h2>Order detail </h2>
 <table class="table table-hover">
      <thead class="table-dark">
        <tr>
           <th>image</th>
           <th>product name</th>          
          <th>qty</th>
          <th>price</th>
          <th>total price</th>
         
        
        
        </tr>
      </thead>
      <tbody>
@foreach ($order->orderDetails as $detail)
<tr class="table-success">
          <td> <img src="{{asset('storage/image')}}/{{$detail->product->image}}" width="70" />   </td>
<td>{{$detail->product->name}}</td>          

          <td>{{$detail->quantity}}</td>
          <td>{{$detail->product->price}}</td>
          <td>{{$detail->quantity*$detail->product->price}}</td>
         

</tr>
@endforeach
      </tbody>

<!-- //table for parts
 --> 
      </table>
     <h2>address</h2>
              <table class="table table-hover">
                 <thead class="table table-dark">
        <tr>
           <th>name</th>
           <th>address</th>          
          <th>city</th>
          <th>area zip code</th>
          <th>pnone #</th>
        </tr>
      </thead>
        <tbody class="table table-info">
      <tr>

           <th>{{$order->address->fName}} {{$order->address->lName}}</th>
           <th>{{$order->address->address}}</th>          
          <th>{{$order->address->city}}</th>
          <th>{{$order->address->zip}}</th>
          <th>{{$order->address->phone}}</th>
    
        </tr>
    </tbody>
    </table>



    
      
     

  </div>
@endsection
