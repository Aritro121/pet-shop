<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function pre()
{
    $user = Product::orderBy('id', 'desc')->get();
    $team = Team::orderBy('created_at', 'desc')->get();
    $count = 0;
    if (Auth::check()) {
        $userid = Auth::id();
        $count = Cart::where('user_id', $userid)->count();
    }
    
    return view('pages.index', ['user' => $user, 'team' => $team , 'count' => $count]);
}


    public function buskit()
    {
        $product = Product::all();
        $users = Auth::user();
        $userid = $users->id;
        $count = Cart::where('user_id', $userid)->count();
    
        return view('pages.index', compact('product', 'count'));
    }

    //for cart
    public function mycart()
    {

        if(Auth::id())
        {
            $users = Auth::user();
            $userid = $users->id;
            $count = Cart::where('user_id', $userid)->count();

            $cart = Cart::where('user_id',$userid)->get();

        }

        return view('pages.mycart',compact('count','cart'));
    }
    //delete cart
    public function deleteCart($id)
    {
        Cart::where('id', $id)->delete();
        return redirect()->back();
    }

    //order Form
    public function orderForm()
    {
        $users = Auth::user();
        $userid = $users->id;
        $count = Cart::where('user_id', $userid)->count();

        session()->flash('success', 'Order Successful');
        return view('orderForm.orderForm',compact('count'));
    }
    //conform Order
    public function conform_order(Request $req){

        $name = $req->name;
        $address = $req->address;
        $phone = $req->phone;
        $email = $req->email;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id',$userid)->get();

        foreach($cart as $carts){
            $order = new Order;

            $order->name = $name;
            $order->address = $address;
            $order->phone = $phone;
            $order->email = $email;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->save();
        }

            $cart_remove = Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
        }

        return redirect()->route('mycart');
    }
}
