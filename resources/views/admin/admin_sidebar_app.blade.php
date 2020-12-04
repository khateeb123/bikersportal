@extends('layouts.app')

@section('content')

<nav class="navabr navbar-expand-md navbar-dark">
<div class="container-fluid">
    <div class="row">
     <div class="col-md-2 bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin-dashboard') }}" class="nav-link text-light mt-2">
                        <i class="fas fa-tachometer-alt"></i>&nbsp; 
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('orders') }}" class="nav-link text-light">
                        <i class="fas fa-rocket"></i>&nbsp;
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rent-orders') }}" class="nav-link text-light">
                       <i class="fas fa-rocket"></i>&nbsp;
                        Rent orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('add-product') }}" class="nav-link text-light">
                        <i class="fas fa-shopping-cart"></i>&nbsp;
                        Add product
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('add-rent-bike') }}" class="nav-link text-light">
                        <i class="fas fa-rocket"></i>&nbsp;
                        Add rent bike
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bikes') }}" class="nav-link text-light">
                        <i class="fas fa-rocket"></i>&nbsp;
                        Bikes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('parts') }}" class="nav-link text-light">
                        <i class="fas fa-cog"></i>&nbsp;
                        Parts
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accessories') }}" class="nav-link text-light">
                       <i class="fas fa-rocket"></i>&nbsp;
                        Accessories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rent-bikes') }}" class="nav-link text-light">
                       <i class="fas fa-rocket"></i>&nbsp;
                        Rent bikes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('inventory') }}" class="nav-link text-light">
                        <i class="fas fa-boxes"></i>&nbsp;
                        Inventory
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users') }}" class="nav-link text-light">
                        <i class="fas fa-user"></i>&nbsp;
                        Users
                    </a>
                </li> <br><br><br><br><br><br><br><br>
            </ul>
        </div>
        
     </div> 
         <main class="col-md-10">
            @yield('admin_content')
         </main>  
    </div>
</div>
</nav>
@endsection
