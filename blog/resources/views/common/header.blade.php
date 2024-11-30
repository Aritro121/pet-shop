<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-2 px-lg-5">
        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center">
                <a class="text-white pr-3" href="{{ url('/about') }}">FAQs</a>
                <span class="text-white">|</span>
                <a class="text-white px-3" href="{{ url('/contact') }}">Help</a>
                <span class="text-white">|</span>
                <a class="text-white pl-3" href="{{ url('/contact') }}">Support</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-white px-3" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-white px-3" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-white px-3" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-white px-3" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-white pl-3" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="{{url('/')}}" class="navbar-brand d-none d-lg-block">
                <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Kit</h1>
            </a>
        </div>
        
        <div class="col-lg-8 text-center text-lg-right">

            <div class="d-inline-flex align-items-center">
                <div class="d-inline-flex flex-column text-center pr-3 border-right">
                    <h6>Opening Hours</h6>
                    <p class="m-0">8.00AM - 9.00PM</p>
                </div>
                <div class="d-inline-flex flex-column text-center px-3 border-right">
                    <h6>Email Us</h6>
                    <p class="m-0">a-19172@mangrove.edu.bd</p>
                </div>
                {{-- <div class="d-inline-flex flex-column text-center pl-3">
                    <h6>Call Us</h6>
                    <p class="m-0">+012 345 6789</p>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
        <a href="" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Safety</span>First</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ url('/about') }}" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
                <a href="{{ url('/shop') }}" class="nav-item nav-link {{ Request::is('shop') ? 'active' : '' }}">Shop</a>
                <a href="{{ url('/service') }}" class="nav-item nav-link {{ Request::is('service') ? 'active' : '' }}">Our Service</a>
                <a href="{{ url('/booking') }}" class="nav-item nav-link {{ Request::is('booking') ? 'active' : '' }}">Booking</a>
                <a href="{{ url('/contact') }}" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
            </div>

            @if(Auth::check())
            @if(Auth::user()->is_admin == 1)
                <!-- Admin: Show Dashboard and Logout -->
                
                <a href="{{ route('admin') }}" class="btn btn-lg btn-primary px-3">Dashboard</a>
                <a href="{{ route('logout') }}" class="btn btn-lg btn-secondary px-3" style="margin-left: 8px;">Logout</a>
                
            @else
            <a href="{{url('/mycart')}}" style="margin-right: 20px; color:white">
                <i class="fa fa-shopping-bag" aria-hidden="true"><img src="/images/favicon.png" alt="" style="width: 17px; height: 17px;">
                </i>
                {{$count}}
            </a>
                <!-- Regular User: Show Profile and Logout -->
                <div class="nav-item dropdown">
                    <a href="{{ route('profile') }}" class="nav-link dropdown-toggle show flex items-center" aria-expanded="true">
                        <img class="rounded-circle me-lg-2" src="{{ asset(Auth::user()->img) }}" alt="" style="width: 40px; height: 40px;">
                        <span class="text-black d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                    </a>
                </div>
               
                <a href="{{ route('logout') }}" class="btn btn-lg btn-secondary px-3">Logout</a>
            @endif
        @else
            <!-- Not Logged In: Show Login -->
            <a href="{{ route('login') }}" class="btn btn-lg btn-primary px-3">Login</a>
        @endif
        
        </div>
    </nav>
</div>
<!-- Navbar End -->