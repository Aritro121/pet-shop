<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addproduct()
    {
        return view('admin.adProduct');
    }

    // List all products
    public function ProductList()
    {
        $user = Product::all();
        return view('admin.allProduct', ['user' => $user]);
    }

    // Add a new product with validation
    public function product(Request $req)
    {
        // Validate incoming request data
        $req->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:1000',
        ]);

        // Initialize data array
        $data = [];

        // Check if the upload directory exists; if not, create it
        if (!is_dir(public_path('front/img/product'))) {
            mkdir(public_path('front/img/product'), 0777, true);
        }

        // Handle image upload
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $name = $image->getClientOriginalName();
            $imagename = time() . "_" . $name;
            $destination = public_path('front/img/product');
            $image->move($destination, $imagename);
            $data['image'] = 'front/img/product/' . $imagename;
        }

        // Prepare product data from the request
        $user = [
            'title' => $req->title,
            'subtitle' => $req->subtitle,
            'price' => $req->price,
            'description' => $req->description,
        ];

        // Merge additional data (image) into the product array
        $user = array_merge($user, $data);

        // Create the product entry in the database
        Product::create($user);

        // Redirect to the product list page with a success message
        return redirect()->route('ProductList')->with('success', 'Product added successfully!');
    }

    // Edit a product
    public function productEdit($id)
    {
        $users = Product::findOrFail($id);
        return view('admin.editProduct', ['data' => $users]);
    }

    // Delete a product
    public function deleteProduct($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    // Update an existing product with validation
    public function updateProduct(Request $req)
    {
        // Validate incoming request data
        $req->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string|max:1000',
        ]);

        // Initialize data array
        $data = [];

        // Check if the upload directory exists; if not, create it
        if (!is_dir(public_path('front/img/product'))) {
            mkdir(public_path('front/img/product'), 0777, true);
        }

        // Handle image upload
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $name = $image->getClientOriginalName();
            $imagename = time() . "_" . $name;
            $destination = public_path('front/img/product');
            $image->move($destination, $imagename);
            $data['image'] = 'front/img/product/' . $imagename;
        }

        // Prepare product data from the request
        $user = [
            'title' => $req->title,
            'subtitle' => $req->subtitle,
            'price' => $req->price,
            'description' => $req->description,
        ];

        // Merge additional data (image) into the product array
        $user = array_merge($user, $data);

        // Update the product in the database
        Product::where('id', $req->id)->update($user);

        // Redirect to the product list page with a success message
        return redirect()->route('ProductList')->with('success', 'Product updated successfully!');
    }
}
