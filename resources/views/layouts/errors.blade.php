<div class="container mt-4">
	<div class="row">
		<div class="col-md-9">
			
			@if ($errors->any())
				
				<div class="alert alert-danger alert-dismissible fade show">
					<ul class="navbar-nav flex-column">
						<button type="button" class="close" data-dismiss="alert">&times;</button>

						@foreach ($errors->all() as $error)

						<li class="nav-item">{{ $error }}</li>	

						@endforeach
					</ul>
				</div>

			@endif


			@if (session('success'))
				
				<div class="alert alert-success alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert">&times;</button>

							{{ session('success') }}
				</div>

			@endif


			@if (session('error'))
				
				<div class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert">&times;</button>

							{{ session('error') }}
				</div>

			@endif

		</div>
	</div>
</div>