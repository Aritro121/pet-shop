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
              <h1 class="m-0">Service Data</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active">Service Data</li>
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
                  <h3 class="card-title">Your Service Data</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <table class="min-w-full divide-y divide-gray-200">
                    @csrf
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            {{-- <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Sub Title</th> --}}
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Short Description</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Quality Servicing</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Expert Workers</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Modern Equipment</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($services as $item)
                        <tr>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">
                                <img src="{{ asset($item->image) }}" alt="Service Image" class="w-16 h-auto rounded-md border border-gray-300 md:w-24" />
                            </td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->title }}</td>
                            {{-- <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->subtitle }}</td> --}}
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->price }}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full {{ $item->feeding ? 'status-active' : 'status-inactive' }}">
                                    {{ $item->feeding ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full {{ $item->boarding ? 'status-active' : 'status-inactive' }}">
                                    {{ $item->Boarding ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full {{ $item->spa ? 'status-active' : 'status-inactive' }}">
                                    {{ $item->spa ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full {{ $item->medicine ? 'status-active' : 'status-inactive' }}">
                                    {{ $item->medicine ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">
                                <div class="flex space-x-2">
                                    {{-- <a href="{{ route('editService', $item->id) }}" class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </a> --}}
                                    <a href="{{ route('deleteServices', $item->id) }}" class="text-red-500 hover:text-red-700">
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
</body>
</html>
