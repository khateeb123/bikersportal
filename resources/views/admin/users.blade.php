@extends('admin.admin_sidebar_app')


@section('admin_content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 mt-3">
				<h4><strong>Users</strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table class="table table-hover mt-3">
					    <thead class="thead-dark">
					      <tr>
					        <th>Name</th>
					        <th>Email</th>
					        <th>Gender</th>
					        <th>Contact</th>
					        <th>Status</th>
					        <th>Created_at</th>
					        <th>Updated_at</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>

					    @foreach ($users as $user)
					    
					      <tr class="table-success">
					        <td>{{ $user->name }}</td>
					        <td>{{ $user->email }}</td>
					        <td>{{ $user->gender }}</td>
					        <td>{{ $user->contact }}</td>
					        <td>
            {{-- give color to status accordingly with if condition --}}
            <span class="badge badge-pill 
             
            {{$user->status=='active' ? 'badge-success':''}} 
            {{$user->status=='blocked' ? 'badge-danger':''}} 
           
           
           
            ">{{$user->status}}</span> </td>
					        <td>{{ $user->created_at }}</td>
					        <td>{{ $user->updated_at }}</td>
					        <td>
	    <a  class="btn btn-outline-danger" href="{{ route('block-user',$user->id) }}">block</a> 
         <a  class="btn btn-outline-success ml-2" href="{{ route('unblock-user',$user->id) }}">unblock</a> 
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