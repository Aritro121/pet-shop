@extends('main')
<body>

@section('content')

<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
        <h2>ALL Products</h2>
    </div>
    <div class="row">
        @foreach ($user as $item)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <a href="{{url('product_details',$item->id )}}">
                        <div class="img-box">
                            <img src="{{ $item->image ? asset($item->image) : asset('path/to/default/image.jpg') }}" alt="Product Image">
                        </div>
                        <div class="detail-box">
                            <h6>{{ $item->title }}</h6>
                            <h6>Price
                                <span>${{ $item->price }}</span>
                            </h6>
                        </div>
                        @if ($item->isNew)
                            <div class="new">
                                <span>New</span>
                            </div>
                        @endif
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

  </section>

  <!-- end shop section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

@endsection()
</body>

</html>