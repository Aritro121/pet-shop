<?php

namespace App\Http\Controllers;

use App\Models\Product;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Ensure this is included at the top
use App\Models\Cart;

class ShopController extends Controller
{
    // public function shop(){
    //     return view('pages.shop');
    // }

    // public function products(){
    //     // $technicians = Product::orderBy('id', 'desc')->limit(4)->get(); // Correct the model name
    //     $user = Product::orderBy('id', 'desc')->get();
    //     return view('pages.shop', ['user' => $user]);
    // }

    public function products()
{
    $count = 0;
    if (Auth::check()) {
        $userid = Auth::id();
        $count = Cart::where('user_id', $userid)->count();
    }
        
    $user = Product::orderBy('id', 'desc')->get();
    
    return view('pages.shop', ['user' => $user , 'count' => $count]);
}

    

    public function product_details($id)
    {
        $data = Product::find($id);

        $users = Auth::user();
        $userid = $users->id;
        $count = Cart::where('user_id', $userid)->count();

        return view('product.productDetels', compact('data', 'count' ));
    }

    //add to Cart
    public function add_cart($id){
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;

        $data->save();
        toastr()->success('Product added to Cart Successful');
        return redirect()->back();
    }
    
}
