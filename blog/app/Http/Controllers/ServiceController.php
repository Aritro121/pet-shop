<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Technicians;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Service;
use App\Models\Technicians;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function serviceList()
    {
        // Retrieve all services
        $services = Service::all(); // Rename variable to avoid confusion
        return view('admin.serviceData', ['services' => $services]);
    }

    public function services(Request $req)
{
    // Validate input
    $validatedData = $req->validate([
        'title' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'title.required' => 'The title field is required.',
        'price.required' => 'The price field is required.',
        'price.numeric' => 'The price must be a valid number.',
        'image.image' => 'The uploaded file must be an image.',
    ]);
    

    // Initialize an empty array for additional data
    $data = [];

    // Check if the upload directory exists; if not, create it
    if (!is_dir(public_path('front/img/uploads'))) {
        mkdir(public_path('front/img/uploads'), 0777, true);
    }

    // Handle image upload
    if ($req->hasFile('image')) { 
        $image = $req->file('image');
        $name = $image->getClientOriginalName(); 
        $imagename = time() . "_" . $name; 
        $destination = public_path('front/img/uploads');
        $image->move($destination, $imagename);
        $data['image'] = 'front/img/uploads/' . $imagename; 
    }

    // Prepare service data
    $user = [
        'title' => $req->title,
        'price' => $req->price,
        'feeding' => $req->has('feeding') ? 1 : 0,
        'boarding' => $req->has('boarding') ? 1 : 0,
        'spa' => $req->has('spa') ? 1 : 0,
        'medicine' => $req->has('medicine') ? 1 : 0,
    ];

    // Merge additional data into the user array
    $user = array_merge($user, $data);

    // Create the service entry in the database
    Service::create($user);

    toastr()->success('Service added successfully.');
    return redirect()->route('serviceList');
}


    // Edit a service
    // public function serviceEdit($id)
    // {
    //     $service = Service::findOrFail($id); // Use findOrFail for better error handling
    //     return view('pages.back.services.editService', ['service' => $service]);
    // }

    // Delete a service
    public function deleteService($id)
    {
        $service = Service::findOrFail($id); // Always check if the service exists before deleting
        $service->delete();
        return redirect()->back();
    }

    // Update a service
    public function updateService(Request $req)
    {
        // Initialize an empty array for additional data
        $data = [];

        // Check if the upload directory exists; if not, create it
        if (!is_dir(public_path('front/img/uploads'))) {
            mkdir(public_path('front/img/uploads'), 0777, true);
        }

        // Handle image upload
        if ($req->hasFile('image')) { // Check if the image was uploaded
            $image = $req->file('image');
            $name = $image->getClientOriginalName(); 
            $imagename = time() . "_" . $name; 
            $destination = public_path('front/img/uploads');
            $image->move($destination, $imagename);
            $data['image'] = 'front/img/uploads/' . $imagename; // Save image path
        }

        // Prepare service data from request
        $user = [
            'title' => $req->title,
            'price' => $req->price,
            'feeding' => $req->has('feeding') ? 1 : 0,
            'boarding' => $req->has('boarding') ? 1 : 0, // Corrected field name
            'spa' => $req->has('spa') ? 1 : 0,
            'medicine' => $req->has('medicine') ? 1 : 0,
        ];
        
        // Merge additional data into the user array
        $user = array_merge($user, $data);
        
        // Update the service in the database
        $service = Service::findOrFail($req->id); // Ensure the service exists
        $service->update($user);

        // Redirect to the service list page
        return redirect()->route('serviceList');
    }

    public function service()
    {
        $count = 0;
        if (Auth::check()) {
            $userid = Auth::id();
            $count = Cart::where('user_id', $userid)->count();
        }

        // $technicians = Technicians::orderBy('id', 'desc')->limit(3)->get();
        $services = Service::orderBy('id', 'desc')->get();
        return view('pages.service', ['services' => $services , 'count' => $count]);
    }
}

