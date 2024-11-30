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
              <h1 class="m-0">Product List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active">Team Member List</li>
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
                  <h3 class="card-title">Your Team Member</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Department</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Facebook</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Twitter</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Instragram</th>
                            <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">Linkedin</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($team as $item)
                        <tr>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">
                                <img src="{{ $item->image ? asset($item->image) : asset('path/to/default/image.jpg') }}" alt="Team Member Image" class="w-16 h-auto rounded-md border border-gray-300 md:w-24" />
                            </td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->name }}</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">{{ $item->department }}</td>
                            <td class="border px-4 py-2"><a href="{{$item->facebook}}" target="_blank" class="text-blue-500">Facebook</td>
                            <td class="border px-4 py-2"><a href="{{$item->twitter}}" target="_blank" class="text-black">Twitter</td>
                            <td class="border px-4 py-2"><a href="{{$item->instagram}}" target="_blank" class="text-pink-500">Instagram</td>
                            <td class="border px-4 py-2"><a href="{{$item->linkedin}}" target="_blank" class="text-sky-500">Linkedin</td>
                            <td class="px-4 py-2 md:px-6 md:py-4 whitespace-nowrap">
                                
                                {{-- <a href="{{ route('productEdit', $item->id) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-edit"></i>
                                </a> --}}
                                <a href="{{ route('deleteTeam', $item->id) }}" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
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
