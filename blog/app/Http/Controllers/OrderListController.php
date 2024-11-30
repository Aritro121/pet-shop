<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    public function orderList()
    {

        $data = Order::orderBy('created_at', 'desc')->get();

        return view('admin.orderList',compact('data'));
    }

    // order on the way 
    public function onTheWay($id)
    {
        $data = Order::find($id);
        $data->status = 'On The Way';
        $data->save();

        return redirect()->route('orderList');
    }

    //order Deleverd
    public function deleverd($id)
    {
        $data = Order::find($id);
        $data->status = 'Deleverd';
        $data->save();

        return redirect()->route('orderList');
    }

    //order delete
    public function cancel($id)
    {
        $service = Order::findOrFail($id); // Always check if the service exists before deleting
        $service->delete();
        return redirect()->back();
    }



    //user Order data
    public function userOrderData()
{
    $order = Order::orderBy('created_at', 'desc')->where('user_id', auth()->id())->get();

    return view('profile.userOrderData', compact('order'));
}

}
