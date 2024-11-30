@extends('main')
<body>

@section('content')

    <!-- Pricing Plan Start -->
    <div class="container-fluid bg-light pt-5 pb-4">
        <div class="container py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Pricing Plan</h4>
                <h1 class="display-4 m-0">Choose the <span class="text-primary">Best Price</span></h1>
            </div>
            <div class="row">
                @foreach($services as $pro)
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0">
                            <div class="card-header position-relative border-0 p-0 mb-4">
                                <img class="card-img-top" src="{{ asset($pro->image) }}" alt="{{ $pro->title }}" style="height: 300px; object-fit: cover;">
                                <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                                    <h3 class="{{ $loop->index === 1 ? 'text-secondary' : 'text-primary' }} mb-3">{{ $pro->title }}</h3>
                                    <h1 class="display-4 text-white mb-0">
                                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>{{ $pro->price }}
                                        <small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                                    </h1>
                                </div>
                            </div>
                            <div class="card-body text-center p-0">
                                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item p-2">
                                        <i class="fa {{ $pro->feeding ? 'fa-check text-secondary' : 'fa-times text-danger' }} mr-2"></i>Feeding
                                    </li>
                                    <li class="list-group-item p-2">
                                        <i class="fa {{ $pro->boarding ? 'fa-check text-secondary' : 'fa-times text-danger' }} mr-2"></i>Boarding
                                    </li>
                                    <li class="list-group-item p-2">
                                        <i class="fa {{ $pro->spa ? 'fa-check text-secondary' : 'fa-times text-danger' }} mr-2"></i>Spa & Grooming
                                    </li>
                                    <li class="list-group-item p-2">
                                        <i class="fa {{ $pro->medicine ? 'fa-check text-secondary' : 'fa-times text-danger' }} mr-2"></i>Veterinary Medicine
                                    </li>
                                </ul>
                                
                            </div>
                            <div class="card-footer border-0 p-0">
                                <a href="{{ url('/booking') }}" class="btn {{ $loop->index === 1 ? 'btn-secondary' : 'btn-primary' }} btn-block p-3" style="border-radius: 0;">Book Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Pricing Plan End -->


    <!-- Booking Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="bg-primary py-5 px-4 px-sm-5">
                        <form class="py-5" action="{{ route('booking') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control border-0 p-4" placeholder="Your Name" required="required" value="{{ old('name') }}" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control border-0 p-4" placeholder="Your Email" required="required" value="{{ old('email') }}" />
                            </div>
                            <div class="form-group">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="text" name="date" class="form-control border-0 p-4 datetimepicker-input" placeholder="Reservation Date" data-target="#date" data-toggle="datetimepicker" value="{{ old('date') }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="service_id" class="custom-select border-0 px-4" style="height: 47px;" required>
                                    <option value="" selected>Select A Service</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            @if (auth()->check())
                                <!-- If user is logged in, show the "Book Now" button -->
                                <div>
                                    <button class="btn btn-dark btn-block border-0 py-3" type="submit">Book Now</button>
                                </div>
                            @else
                                <!-- If user is not logged in, show a redirect or login message -->
                                <div>
                                    <a href="{{ route('login') }}" class="btn btn-dark btn-block border-0 py-3">Please Login to Book</a>
                                </div>
                            @endif

                        </form>
                    </div>
                </div>
                <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                    <h4 class="text-secondary mb-3">Going for a vacation?</h4>
                    <h1 class="display-4 mb-4">Book For <span class="text-primary">Your Pet</span></h1>
                    <p>Labore vero lorem eos sed aliquy ipsum aliquy sed. Vero dolore dolore takima ipsum lorem rebum</p>
                    <div class="row py-2">
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-house font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Boarding</h5>
                                </div>
                                <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-food font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Feeding</h5>
                                </div>
                                <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-grooming font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Grooming</h5>
                                </div>
                                <p class="m-0">Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-toy font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Tranning</h5>
                                </div>
                                <p class="m-0">Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Start -->


    <!-- Footer Start -->
   
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->

@endsection()
</body>

</html>