@extends("adminDash")
@section('main_content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Booking List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Booking List</li>
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
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Service</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">User</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($bookings as $item)
                        <tr>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->name }}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->email }}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->service->title ?? 'N/A' }}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->date }}</td>
                            <td>
                                <p>{{ optional($item->user)->name ?? 'N/A' }}</p>
                                <p>{{ optional($item->user)->email ?? 'N/A' }}</p>
                            </td>

                            <td>
                                @if($item->status == "accepted")
                                  <a href="{{route('booking.decline', $item->id)}}" class="btn btn-danger">Decline</a>
                                @elseif($item->status == "declined")
                                  <a href="{{route('booking.accept', $item->id)}}" class="btn btn-success">Accept</a>
                                @else
                                  <a href="{{route('booking.accept', $item->id)}}" class="btn btn-success">Accept</a>
                                  <a href="{{route('booking.decline', $item->id)}}" class="btn btn-danger">Decline</a>
                                @endif
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
