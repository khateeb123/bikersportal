@extends('admin.admin_sidebar_app')


@section('admin_content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 mt-3">
				<h4><strong>Rent Orders </strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive table-sm">
					<table class="table  table-hover mt-3">
					    <thead class="thead-dark">
					      <tr>
					        <th>user</th>
					        <th>bike</th>
					        <th>days</th>
					        <th>total rent</th>
					        <th>start date</th>
					        <th>end date</th>
					        <th>status</th>
					        <th>action</th>
					      </tr>
					    </thead>
					    <tbody>
					    	@foreach ($rentOrders as $rentOrder)
		
					      <tr class="table-success">
					        <td>{{$rentOrder->user->email}}</td>
					        <td>{{$rentOrder->rentBike->name}}</td>
					        <td>{{$rentOrder->days}}</td>
					        <td>${{$rentOrder->total_rent}}</td>
					        <td>{{$rentOrder->start_date}}</td>
					        <td>{{$rentOrder->end_date}}</td>
					         <td>
		            {{-- give color to status accordingly with if condition --}}
						            <span class="badge badge-pill 
						            {{$rentOrder->status=='pending' ? 'badge-warning':''}} 
						            {{$rentOrder->status=='accepted' ? 'badge-success':''}} 
						            {{$rentOrder->status=='rejected' ? 'badge-danger':''}} ">
						            {{$rentOrder->status}}</span> 
						       		 </td>
					     <td>
	   <a  class="btn btn-outline-success" href="{{ route('accept-r-order',$rentOrder->id) }}">accept</a> 
         <a  class="btn btn-outline-danger ml-2" href="{{ route('reject-r-order',$rentOrder->id) }}">reject</a> 
        
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