@extends('layouts.app')


@section('content')
@include('layouts.errors')
	<div class="container mt-4">
		<div class="row">
			<div class="offset-4 col-sm-7">
				<h2><i class="fas fa-user text-primary"></i> &nbsp;User profile</h2>
			</div>
		</div>
	</div>
	<div class="container mt-4">
		<div class="row">
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="#home" class="nav-link active" data-toggle="tab">Home</a>
					</li>
			@if (auth()->user()->role->name=='customer')
					<li class="nav-item">
						<a href="#orders" class="nav-link" data-toggle="tab">Orders</a>
					</li>
					<li class="nav-item">
						<a href="#rentOrders" class="nav-link" data-toggle="tab">Rent Orders</a>
					</li>
			@endif
					<li class="nav-item">
						<a href="#profile" class="nav-link" data-toggle="tab">Profile</a>
					</li>
				{{-- expr --}}
					<li class="nav-item">
						<a href="#changePassword" class="nav-link" data-toggle="tab">Change Password</a>
					</li>
					<li class="nav-item">
						<a href="#changeProfile" class="nav-link" data-toggle="tab">Change Profile</a>
					</li>

				</ul>

				<div class="tab-content mt-4">
					<div class="tab-pane fade show active" id="home">
						<h3>User</h3>
						<p>User profile is gave the facility to user to manage their profiles. User can check his/her orders/rent orders and their status. User can see his/her profile and can modify our profiles by clicking change profile tab like change in address or contact number etc. User can also changer his/her password by clicking change password tab.</p>
					</div>

					<div class="tab-pane fade" id="orders">
						<h3>Orders</h3>
						 <div class="table-responsive">
					<table class="table table-hover mt-3">
					    <thead class="thead-dark">
					      <tr>
					        
					       
					        <th>total payment</th>
					        <th>order date</th>
					        <th>status</th>
					        
					        <th>view detail</th>
					      </tr>
					    </thead>
					    <tbody>
				@foreach ($orders as $order)
				  <tr class="table-primary">

					     
					        <td>${{$order->total_price}}</td>
					        <td>{{$order->created_at}}</td>
					        <td>
            {{-- give color to status accordingly with if condition --}}
            <span class="badge badge-pill 
            {{$order->status=='pending' ? 'badge-warning':''}} 
            {{$order->status=='accepted' ? 'badge-success':''}} 
            {{$order->status=='rejected' ? 'badge-danger':''}} 
           
           
           
            ">{{$order->status}}</span> </td>
		 <td> <a target="_blank" class=" " href="{{ route('order-detail',$order->id) }}">view</a> </td>
					        
					        
					      </tr>
				@endforeach

					    
					     
					    </tbody>
			  		</table>
				</div>
						
					
					
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</div>

					<div class="tab-pane fade" id="rentOrders">
						<h3>Rent Orders</h3>
						<div class="table-responsive">
					<table class="table table-hover mt-3">
					    <thead class="thead-dark">
					      <tr>
					        
					       
					        <th>bike </th>
					        <th>total rent</th>
					        <th>start date</th>
					        <th>end date</th>
    					     <th>days</th>
    					    <th>status</th>
					      </tr>
					    </thead>
					    <tbody>
				@foreach ($rentOrders as $rentOrder)
				  <tr class="table-primary">

					     
					        <td>{{$rentOrder->rentBike->name}}</td>
					        <td>${{$rentOrder->total_rent}}</td>
					        <td>{{$rentOrder->start_date}}</td>
					        <td>{{$rentOrder->end_date}}</td>
					        <td>{{$rentOrder->days}}days</td>
					        <td>
            {{-- give color to status accordingly with if condition --}}
            <span class="badge badge-pill 
            {{$rentOrder->status=='pending' ? 'badge-warning':''}} 
            {{$rentOrder->status=='accepted' ? 'badge-success':''}} 
            {{$rentOrder->status=='rejected' ? 'badge-danger':''}} 
           
           
           
            ">{{$rentOrder->status}}</span> </td>
					        
					        
					      </tr>
				@endforeach

					    
					     
					    </tbody>
			  		</table>
				</div>




						</div>

					<div class="tab-pane fade" id="profile">
						<h3>Profile</h3>
						<div class="card border-info" style="max-width: 22rem;">
							<div class="card-header bg-transparent border-info">Profile</div>
								<div class="card-body">
									<p>Name: {{auth()->user()->name}}</p>
									<p>Email: {{auth()->user()->email}}</p>
									<p>Gender: {{auth()->user()->gender}}</p>
									<p>Phone: {{auth()->user()->contact}}</p>
								
								</div>
						</div>
					</div>

					<div class="tab-pane fade" id="changePassword">
						<h3>Change Password</h3>
						<div class="card border-info" style="max-width: 22rem;">
							<div class="card-header bg-transparent border-info">Profile</div>
								<div class="card-body">
									<p>Name: {{auth()->user()->name}}</p>
									<p>Email: {{auth()->user()->email}}</p>
									<p>Gender: {{auth()->user()->gender}}</p>
									<p>Phone: {{auth()->user()->contact}}</p>
								</div>
								<div class="card-footer bg-transparent border-info">
									<button class="btn btn-danger" 
										data-toggle="modal" data-target="#changePass">
										Change Password
									</button>
								</div>
						</div>
					</div>

					<div class="tab-pane fade" id="changeProfile">
						<h3>Change Profile</h3>
						<div class="card border-info mb-3" style="max-width: 22rem;">
							<div class="card-header bg-transparent border-info">Change Profile</div>
								<div class="card-body">
								<p>Name: {{auth()->user()->name}}</p>
									<p>Email: {{auth()->user()->email}}</p>
									<p>Gender: {{auth()->user()->gender}}</p>
									<p>Phone: {{auth()->user()->contact}}</p>
								</div>
								<div class="card-footer bg-transparent border-info">
									<button class="btn btn-success" 
										data-toggle="modal" data-target="#changePro">
										Change Profile
									</button>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Password change Model -->
	<form method="POST" action="{{ route('update-password') }}">
		@csrf
					<!-- The Modal -->
		<div class="modal fade" id="changePass">
			<div class="modal-dialog">
				<div class="modal-content">
					
					 <!-- Modal Header -->
					 <div class="modal-header">
					 	<h4 class="modal-title">Changing Password</h4>
					 	<button type="button" class="close" data-dismiss="modal">&times;</button>
					 </div>

					 <!-- Modal body -->
					 <div class="modal-body">
				 		<div class="form-group">
				 			<label for="oldPass" class="col-form-label">Old Password:</label>
				 			<input type="password" class="form-control" name="oldPass" id="oldPass" 
				 				placeholder="user's old password">
				 		</div>

				 		<div class="form-group">
				 			<label for="newPass" class="col-form-label">New Password:</label>
				 			<input type="password" class="form-control" name="newPass" id="newPass" 
				 				placeholder="user's new password">
				 		</div>

				 		<div class="form-group">
				 			<label for="confirmPass" class="col-form-label">Confirm Password:</label>
				 			<input type="text" class="form-control" name="password_confirmation" id="confirmPass" 
				 				placeholder="user's new password confirmation">
				 		</div>
					 	
					 </div>

					 <!-- Modal footer -->
					 <div class="modal-footer">
					 	<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
					 	<button type="submit" class="btn btn-success">
					 		Save Changes
					 	</button>
					 </div>
				</div>
			</div>
		</div>
	</form>		
		
		<!-- Profile change Model -->
		<form method="POST" action="{{ route('update-profile') }}">
		@csrf
					<!-- The Modal -->
		<div class="modal fade" id="changePro">
			<div class="modal-dialog">
				<div class="modal-content">
					
					 <!-- Modal Header -->
					 <div class="modal-header">
					 	<h4 class="modal-title">Changinging Profile</h4>
					 	<button type="button" class="close" data-dismiss="modal">&times;</button>
					 </div>

					 <!-- Modal body -->
					 <div class="modal-body">
				 		<div class="form-group">
				 			<label for="name" class="col-form-label">Name:</label>
				 			<input type="text" class="form-control" name="name" id="name" 
				 				placeholder="user's name">
				 		</div>

				 		<div class="form-group">
				 			<label for="contact" class="col-form-label">Contact:</label>
				 			<input type="text" class="form-control" name="contact" id="contact" 
				 				placeholder="user's contact #">
				 		</div>

					 	
					 </div>

					 <!-- Modal footer -->
					 <div class="modal-footer">
					 	<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
					 	<button type="submit" class="btn btn-success">
					 		Save Changes
					 	</button>
					 </div>
				</div>
			</div>
		</div>
	</form>
	
	</div>

@endsection