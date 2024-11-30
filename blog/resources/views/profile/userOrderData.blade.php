@extends("user")
@section('main_content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Your Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Your Order</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Your Bookings</h3>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">status</th>
                            {{-- <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($order as $item)
                        <tr>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">
                                <img 
                                    src="{{ $item->product->image ? asset($item->product->image) : asset('path/to/default/image.jpg') }}" 
                                    alt="Service Image" 
                                    class="rounded-md border border-gray-300" 
                                    style="width: 75px; height: 75px; object-fit: cover;" 
                                />
                            </td>
                            
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{$item->product->title}}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{$item->product->price}}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{$item->created_at}}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{$item->status}}</td>
                                                                                
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
