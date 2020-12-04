@extends('admin.admin_sidebar_app')


@section('admin_content')
@include('layouts.errors')

	<div class="container">
		<div class="row">
			<div class="col-sm-12 mt-3">
				<h4><strong>Orders </strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive table-sm">
					<table class="table table-hover ">
      <thead class="table-dark">
        <tr>
          <th>order_id</th>          
          <th>user</th>
          <th>status</th>
          <th>order date</th>
          <th>Detail</th>
          <th>action</th>
         </tr>
      </thead>

      <tbody >
@foreach ($orders as $order)
		<tr class="table-success">
        <td>{{$order->id}}</td>
          <td>{{$order->user->email}}</td>
           <td>
            {{-- give color to status accordingly with if condition --}}
            <span class="badge badge-pill 
            {{$order->status=='pending' ? 'badge-warning':''}} 
            {{$order->status=='accepted' ? 'badge-success':''}} 
            {{$order->status=='rejected' ? 'badge-danger':''}} 
           
           
           
            ">{{$order->status}}</span> </td>

         
       {{--  <td>{{$order->quantity}}</td> --}}
          {{--  <td>{{$order->quantity*$data->price}}</td> --}}
       
       <td >
           {{$order->created_at->format('d/m/Y')}}
       </td> 
      <td> <a target="_blank" class=" " href="{{ route('order-detail',$order->id) }}">view</a> </td>
          <td class="row" >
         
           <!--  delete button in the from -->
         <a  class="btn btn-outline-success" href="{{ route('accept-order',$order->id) }}">accept</a> 
          <a  class="btn btn-outline-danger ml-2" href="{{ route('reject-order',$order->id) }}">reject</a> 
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