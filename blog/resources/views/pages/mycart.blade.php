<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300 min-h-screen flex justify-center items-center font-sans">
    <div class="flex flex-wrap h-[75vh] w-11/12 max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Cart Section -->
        <div class="w-full md:w-1/2 p-6 bg-white overflow-y-auto">
            <h4 class="text-lg font-bold mb-6">Shopping Cart</h4>
            <?php $value = 0 ?>
            @foreach($cart as $cart)
            <div class="flex justify-between items-center border-b pb-4 mb-4" data-user-id="{{ $cart->user_id }}" data-product-id="{{ $cart->product_id }}">
                <img src="{{asset($cart->productt->image)}}" alt="Item 1" class="w-16 h-auto">
                <div class="flex-1 ml-4">
                    <p class="font-bold">{{$cart->productt->title}}</p>
                    <p class="text-gray-500">{{$cart->productt->subtitle}}</p>
                    <a href="{{ route('deleteCart', $cart->id) }}" 
                        class="text-red-500 hover:text-red-700 text-sm flex items-center">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-500">-</a>
                    <span>1</span>
                    <a href="#" class="text-gray-500">+</a>
                </div>
                <div class="font-bold text-gray-800">&euro;{{$cart->productt->price}}</div>
            </div>
            <?php $value += $cart->productt->price ?>
            @endforeach
        </div>

        <!-- Summary Section -->
        <div class="w-full md:w-1/2 p-6 bg-gray-200 text-gray-800 flex flex-col justify-between">
            <div>
                <h5 class="font-bold mb-4">Summary</h5>
                <hr class="border-gray-400 mb-4">
                <div class="flex justify-between mb-4">
                    <span>ITEMS PRICE</span>
                    <span>&euro;{{$value}}</span>
                </div>
                <form>
                    <p class="mb-2">SHIPPING</p>
                    <select class="w-full p-2 border border-gray-300 rounded mb-4 bg-gray-100">
                        <option class="text-gray-500">Standard-Delivery - &euro;5.00</option>
                    </select>
                </form>
            </div>
            <form>
                <p class="mb-2">Payment Method</p>
                <select class="w-full p-2 border border-gray-300 rounded mb-4 bg-gray-100">
                    <option class="text-gray-500">Cash on Delivery</option>
                </select>
            </form>
            <div>
                <div class="flex justify-between border-t pt-4 mt-4 border-gray-400">
                    <span>TOTAL PRICE</span>
                    <span>&euro;{{$value + 5}}</span>
                </div>
                <a href="{{ route('orderForm') }}" class="block bg-black text-white text-center py-2 mt-6 uppercase rounded hover:bg-gray-800">Checkout</a>
            </div>
        </div>
    </div>
    
</body>
</html>
