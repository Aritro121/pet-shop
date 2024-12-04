@extends('main')

@section('content')
<div class="container-fluid pt-5">
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h4 class="text-secondary mb-3">Contact Us</h4>
        <h1 class="display-4 m-0">Contact For <span class="text-primary">Any Query</span></h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 mb-5">
            <div class="contact-form">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('contuctData') }}" method="POST">
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control p-4" name="name" value="{{ old('name') }}" placeholder="Your Name" required />
                        <br>
                        @error('name')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control p-4" name="email" value="{{ old('email') }}" placeholder="Your Email" required />
                        <br>
                        @error('email')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="control-group">
                        <textarea class="form-control p-4" rows="6" name="message" placeholder="Message" required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <br>
                    <div>
                        <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 mb-n2 p-0">
            <iframe style="width: 100%; height: 500px;" 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3710.5638053968937!2d89.5368818!3d22.8433956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9a9068161927%3A0xac8fb86be652ad48!2sMangrove%20Institute%20of%20Science%20and%20Technology!5e0!3m2!1sen!2sbd!4v1694958493241!5m2!1sen!2sbd" 
        frameborder="0" 
        style="border:0;" 
        allowfullscreen="" 
        aria-hidden="false" 
        tabindex="0">
</iframe>

        </div>
    </div>
</div>
@endsection
