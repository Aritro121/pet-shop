<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Service Data</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <style>
        /* Additional styling for status badges */
        .status-active {
            background-color: #4ade80; /* Green */
            color: #ffffff;
        }
        .status-inactive {
            background-color: #f87171; /* Red */
            color: #ffffff;
        }
    </style>
</head>
<body class="bg-gray-100">

    @extends("adminDash")
    @section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Order List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active">Order List</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
    <div class="content ">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Address</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">status</th>
                            {{-- <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($data as $item)
                        <tr>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">
                                <img src="{{ $item->product->image ? asset($item->product->image) : asset('path/to/default/image.jpg') }}" alt="Service Image" class="w-16 h-auto rounded-md border border-gray-300 md:w-24" />
                            </td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{$item->name}}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{$item->product->title}}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{$item->product->price+5}}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{$item->phone}}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{$item->email}}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{$item->address}}</td>
                            {{-- <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap 
                                        @if($item->status == "On The Way")
                                            text-yellow-500
                                        @elseif($item->status == "Deleverd")
                                            text-green-500
                                        @else
                                            text-red-500
                                        @endif">
                                        {{$item->status}}
                                    </td> --}}

                                    <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap text-sm 
                                    @if($item->status == 'On The Way')
                                        text-yellow-500
                                    @elseif($item->status == 'Deleverd')
                                        text-green-500
                                    @else
                                        text-red-500
                                    @endif
                                ">            
                        @if($item->status == "On The Way")
                            <a href="{{ route('deleverd', $item->id) }}" class="btn btn-primary" title="Mark as Delivered">Delivered</a>
                        @elseif($item->status == "Deleverd")
                            <!-- No further actions, display Delivered -->
                            <span class="text-green-500">Delivered</span>
                        @else
                            <a href="{{ route('onTheWay', $item->id) }}" class="btn btn-primary" title="Mark as On The Way">On The Way</a>
                            <a href="{{ route('cancel', $item->id) }}" class="btn btn-danger" title="Cancel Order">Cancel</a>
                        @endif
                    </td>

                                                                                
                        @endforeach
                    </tbody>
                </table>
                
              </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
