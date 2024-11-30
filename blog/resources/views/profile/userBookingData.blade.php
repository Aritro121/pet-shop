@extends("user")
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
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($profileBooking as $item)
                        @csrf
                        <tr>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->name }}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->email }}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->service->title ?? 'N/A' }}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->date }}</td>
                            <td class="py-4 px-6">
                                @if ($item->status == 'accepted')
                                <span class="inline-block px-3 py-1 text-sm font-semibold bg-green-100 text-green-600 rounded-full">Accepted</span>
                                @elseif ($item->status == 'rejected')
                                <span class="inline-block px-3 py-1 text-sm font-semibold bg-red-100 text-red-600 rounded-full">Rejected</span>
                                @else
                                <span class="inline-block px-3 py-1 text-sm font-semibold bg-yellow-100 text-yellow-600 rounded-full">Pending</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <a href="{{ route('deleteBooking', $item->id) }}" class="text-red-500 hover:text-red-700" aria-label="Delete booking">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
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
