@extends('admin.admin_sidebar_app')

@section('admin_content')
<div class="container">
    <div class="row">
        <div class="offset-1 col-md-10">
            <div class="card-deck mt-4">
                <div class="card bg-dark">
                    <a class="card-link" href="{{ route('orders') }}">
                        <div class="card-body text-white text-center">
                            <i class="fas fa-rocket"></i>
                            <h5 class="card-title">Orders</h5>
                            <p class="card-text">{{$orders}}</p>
                        </div>
                    </a>
                </div>

                <div class="card bg-dark">
                    <a class="card-link" href="{{ route('rent-orders') }}">
                        <div class="card-body text-white text-center">
                            <i class="fas fa-rocket"></i>
                            <h5 class="card-title">Rent Orders</h5>
                            <p class="card-text">{{$rentOrders}}</p>
                        </div>
                    </a>
                </div>

                <div class="card bg-dark">
                    <a class="card-link" href="{{ route('add-product') }}">
                        <div class="card-body text-white text-center">
                           <i class="fas fa-shopping-cart"></i>
                            <h5 class="card-title">Add Product</h5>
                            <p class="card-text">{{$products}}</p>
                        </div>
                    </a>
                </div>

                 <div class="card bg-dark">
                    <a class="card-link" href="{{ route('add-rent-bike') }}">
                        <div class="card-body text-white text-center">
                            <i class="fas fa-rocket"></i>
                            <h5 class="card-title">Add Rent Bike</h5>
                            <p class="card-text">{{$rentBikes}}</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card-deck mt-4">
                <div class="card bg-danger">
                    <a class="card-link" href="{{ route('bikes') }}">
                        <div class="card-body text-white text-center">
                           <i class="fas fa-rocket"></i>
                            <h5 class="card-title">Bikes</h5>
                            <p class="card-text">{{$bikes}}</p>
                        </div>
                    </a>
                </div>

                <div class="card bg-warning">
                    <a class="card-link" href="{{ route('parts') }}" style="color: black;">
                        <div class="card-body text-center">
                           <i class="fas fa-cog"></i>
                            <h5 class="card-title">Parts</h5>
                            <p class="card-text">{{$products}}</p>
                        </div>
                    </a>
                </div>

                <div class="card bg-success">
                    <a class="card-link" href="{{ route('accessories') }}">
                        <div class="card-body text-white text-center">
                            <i class="fas fa-rocket"></i>
                            <h5 class="card-title">Accessories</h5>
                            <p class="card-text">{{$accessories}}</p>
                        </div>
                    </a>
                </div>

                <div class="card bg-dark">
                    <a class="card-link" href="{{ route('rent-bikes') }}">
                        <div class="card-body text-white text-center">
                            <i class="fas fa-rocket"></i>
                            <h5 class="card-title">Rent Bikes</h5>
                            <p class="card-text">{{$rentBikes}}</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card-deck mt-4">
                 <div class="card bg-danger">
                    <a class="card-link" href="{{ route('inventory') }}">
                        <div class="card-body text-white text-center">
                           <i class="fas fa-boxes"></i>
                            <h5 class="card-title">Inventory</h5>
                            <p class="card-text">{{$products}}</p>
                        </div>
                    </a>
                </div>

                <div class="card bg-warning">
                    <a class="card-link" href="{{ route('users') }}" style="color: black;">
                        <div class="card-body text-center">
                            <i class="fas fa-user"></i>
                            <h5 class="card-title">Users</h5>
                            <p class="card-text">{{$users}}</p>
                        </div>
                    </a>
                </div>

               
                
            </div>
        </div>
    </div>
</div>


@endsection