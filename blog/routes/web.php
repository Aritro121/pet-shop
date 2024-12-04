<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContuctController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('index');
Route::get('/', [HomeController::class, 'pre'])->name('home');

Route::get('/about', [AboutController::class, 'about']);

// Route::get('/shop', [ShopController::class, 'shop'])->name('shop');

Route::get('/shop', [ShopController::class, 'products']);
Route::get('/contact', [ContuctController::class, 'contact']);

// Route::get('/booking', function () {
//     return view('pages.booking');
// });

//Login
Route::get('/login', function () {
    return view('login-signup.login');
});

//Signup
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/signupData', [UserController::class, 'signupData'])->name('signupData');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/login/check', [UserController::class, 'loginCheck'])->name('login.check');

//profile
Route::get('/dashbord', function () {
    return view('userDashbord.profile');
})->name('profile')->middleware('user');

//admin
Route::get('/admin', function () {
    return view('admin.userProfile');
})->name('admin')->middleware('admin');

//Ad Service
Route::get('/admin/add-service', function () {
    return view('admin.adService');
})->name('add.service')->middleware('admin');
Route::post('/admin/service', [ServiceController::class, 'services'])->name('store')->middleware('admin');
Route::get('/admin/service-list', [ServiceController::class, 'serviceList'])->name('serviceList')->middleware('admin');
// delete service 
Route::get('/delete/{id}', [ServiceController::class, 'deleteService'])->name('deleteServices')->middleware('admin');
//service
Route::get('/service', [ServiceController::class, 'service'])->name('service');


//booking
// For creating a new booking (POST request)
Route::post('user/booking', [BookingController::class, 'storeBooking'])->name('booking')->middleware('user');
// For showing the booking list
Route::get('/booking-list', [BookingController::class, 'bookingList'])->name('bookingList')->middleware('admin');
// For deleting a booking
Route::get('/booking/delete/{id}', [BookingController::class, 'deleteBooking'])->name('deleteBooking')->middleware('user');
// For showing the booking form
Route::get('/booking', [BookingController::class, 'showBookingForm'])->name('booking.form');

//acept and booking
Route::get('admin/booking/accept/{id}', [BookingController::class, 'acceptBooking'])->name('booking.accept')->middleware('admin');
Route::get('admin/booking/decline/{id}', [BookingController::class, 'declineBooking'])->name('booking.decline')->middleware('admin');


//user booking Data
Route::get('/user/profile/bookingData', [BookingController::class, 'profileBookingList'])->name('userBookingData')->middleware('user');

// add product 
Route::get('/admin/ad-product', [ProductController::class, 'addproduct'])->name('addproduct')->middleware('admin');
Route::post('admin/service/store', [ProductController::class, 'product'])->name('productStore')->middleware('admin');
Route::get('/admin/product-data', [ProductController::class, 'ProductList'])->name('ProductList')->middleware('admin');

// product delete 
Route::get('/admin/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct')->middleware('admin');
// product edit 
Route::get('/admin/product/edit/{id}', [ProductController::class, 'productEdit'])->name('productEdit')->middleware('admin');
// product update 
Route::post('/admin/product/update/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct')->middleware('admin');

//product
Route::get('/product', function () {
    return view('ProductPage.product');
})->name('product');

Route::get('/product_details/{id}',[ShopController::class, 'product_details']);

//add to Cart
Route::get('/add_cart/{id}',[ShopController::class, 'add_cart'])->middleware('user');
Route::get('/mycart',[HomeController::class, 'mycart'])->name('mycart')->middleware('user'); 
//delete Cart
Route::get('/deleteCart/{id}', [HomeController::class, 'deleteCart'])->name('deleteCart')->middleware('user');


// order form 
Route::get('/orderForm', [HomeController::class, 'orderForm'])->name('orderForm')->middleware('user');
Route::post('/conform_order', [HomeController::class, 'conform_order'])->name('conform_order')->middleware('user');

//order List
Route::get('/admin/order-list', [OrderListController::class, 'orderList'])->name('orderList')->middleware('admin');
Route::get('/admin/order-list/on-the-way/{id}', [OrderListController::class, 'onTheWay'])->name('onTheWay')->middleware('admin');
Route::get('/admin/order-list/deleverd/{id}', [OrderListController::class, 'deleverd'])->name('deleverd')->middleware('admin');
Route::get('/admin/order-list/cancel/{id}', [OrderListController::class, 'cancel'])->name('cancel')->middleware('admin');

Route::get('/user/userOrderData', [OrderListController::class, 'userOrderData'])->name('userOrderData')->middleware('user');

//Add - Team
Route::get('/admin/add-team', [TeamController::class, 'addTeam'])->name('addTeam')->middleware('admin');
Route::post('/admin/team-added', [TeamController::class, 'team_added'])->name('teamAdded')->middleware('admin');
Route::get('/admin/team-list', [TeamController::class, 'teamList'])->name('teamList')->middleware('admin');
Route::get('/admin/team-delete/{id}', [TeamController::class, 'deleteTeam'])->name('deleteTeam')->middleware('admin');

//contuct
Route::post('/contuct-data', [ContuctController::class, 'contuctData'])->name('contuctData')->middleware('user');
Route::get('/admin/contuct-list', [ContuctController::class, 'ContactList'])->name('ContactList')->middleware('admin');