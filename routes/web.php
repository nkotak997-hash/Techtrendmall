<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\samplecontroller;
use App\Http\Controllers\ragistercontroller;
use App\Http\Controllers\maincontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\reviewsController;
use App\Http\Controllers\RazorpayPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[samplecontroller::class,'index']);

// Route::get('/index', [samplecontroller::class, 'index'])->name('index');
Route::get('login', function () {
    return view('login'); // Assuming you have a login view
})->name('login');
Route::get('login', [samplecontroller::class, 'showLoginForm'])->name('login');
Route::post('login', [samplecontroller::class, 'login']);
Route::post('/login', [samplecontroller::class, 'login'])->name('login');

Route::get('Register', function () {
    return view('Register'); // Assuming you have a register view
})->name('Register');
Route::get('/register', [Ragistercontroller::class, 'showForm'])->name('register.form');
Route::post('/register', [ragistercontroller::class, 'register'])->name('register.submit');
Route::post('/register', [ragistercontroller::class, 'registerSubmit'])->name('register.submit');

Route::get('/index', [samplecontroller::class, 'index'])->name('index');
Route::get('/product', [samplecontroller::class, 'product'])->name('product');

Route::get('/navbar', [samplecontroller::class, 'navbar'])->name('navbar');

Route::get('/about', [samplecontroller::class, 'about'])->name('about');

Route::get('/contact', [samplecontroller::class, 'contact'])->name('contact');

Route::post('/contact', [samplecontroller::class, 'submit'])->name('contact.submit');
Route::get('/contact', [samplecontroller::class, 'showForm'])->name('contact.form');
Route::post('/contact', [samplecontroller::class, 'submit'])->name('contact.submit');

Route::get('/forgot', [samplecontroller::class, 'forgot'])->name('forgot');

Route::get('/profile', [samplecontroller::class, 'profile'])->name('profile');

Route::get('/add_to_cart', [samplecontroller::class, 'add_to_cart'])->name('add_to_cart');

Route::get('/offer', [samplecontroller::class, 'offer'])->name('offer');

Route::get('/login', [samplecontroller::class, 'showLoginForm'])->name('login');
Route::post('/login', [samplecontroller::class, 'login'])->name('loginSubmit');
Route::get('/dashboard', [samplecontroller::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/logout', [samplecontroller::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [samplecontroller::class, 'dashboard'])->name('dashboard');
});
Route::get('/category/{id}', [samplecontroller::class, 'show_product'])->name('product.category');
Route::get('/product/{id}', [samplecontroller::class, 'show'])->name('product.details');
Route::get('/add_to_cart/{id}', [samplecontroller::class, 'add'])->name('add_to_cart');
// Define your route for purchasing as well
// Route to show the edit form
Route::get('/profile/{id}/edit_profile', [samplecontroller::class, 'edit'])->name('edit_profile');
Route::post('/profile/{id}', [samplecontroller::class, 'update'])->name('profile.update');
Route::get('verifyAccount/{email}/{token}', [ragistercontroller::class, 'verify_email']);

// Display the forgot password form
Route::get('password/forgot', function () {
    return view('forgot-password');
})->name('password.request');


Route::get('/forgot-password', [OTPController::class, 'showForgotPasswordForm'])->name('forgot.password.form');
Route::post('/forgot-password', [OTPController::class, 'sendOtp'])->name('forgot.password.sendOtp');
Route::get('/verify-otp', [OTPController::class, 'showOtpVerificationForm'])->name('verify.otp.form');
Route::post('/verify-otp', [OTPController::class, 'verifyOtp'])->name('verify.otp');
Route::get('/reset-password', [OTPController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('/reset-password', [OTPController::class, 'updatePassword'])->name('reset.password.update');


Route::get('/otp', [OTPController::class, 'otp'])->name('otp');

Route::middleware('auth')->group(function () {
    Route::get('change-password', [samplecontroller::class, 'showChangePasswordForm'])->name('change.password.form');
    Route::post('change-password', [samplecontroller::class, 'changePassword'])->name('change.password');
});
Route::get('/about', [samplecontroller::class, 'showAboutPage']);
Route::get('/search', [ragistercontroller::class, 'search'])->name('search');
// Route::get('/index', [samplecontroller::class, 'showVideo']);
Route::middleware('auth')->group(function () {
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
});
// routes/web.php
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

// Add a product to the wishlist
Route::post('/wishlist/add/{productId}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');

// Remove a product from the wishlist
Route::delete('/wishlist/remove/{productId}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');


Route::post('/reviews', [reviewsController::class, 'store'])->name('reviews.store');

//razorpayment
Route::get('payment', [RazorpayPaymentController::class, 'index']);
Route::post('payment', [maincontroller::class, 'pay']);

// Admin Routes
Route::get('/admin/customers_ad', [maincontroller::class, 'index'])->name('customers');
Route::get('/admin/dashboard_ad', [maincontroller::class, 'dashboard'])->name('dashboard');
Route::get('/admin/messages_ad', [maincontroller::class, 'messages'])->name('messages');
Route::get('/admin/view_products_ad', [maincontroller::class, 'view_products'])->name('view_products');
Route::get('/admin/category_ad', [maincontroller::class, 'category'])->name('category');
Route::get('/admin/orders_ad', [maincontroller::class, 'orders'])->name('orders');
Route::get('/admin/order_detail_ad', [maincontroller::class, 'order_detail'])->name('order_detail');
Route::get('/admin/add_pro_ad', [maincontroller::class, 'add_pro'])->name('add_pro');
Route::post('/admin/add_pro_ad', [maincontroller::class, 'store'])->name('add_pro');
Route::get('/admin/profile_ad', [maincontroller::class, 'profile_ad'])->name('profile_ad');
Route::get('/admin/add_catagory_ad', [maincontroller::class, 'add_catagory_ad'])->name('add_catagory_ad');
Route::post('/admin/add_cat', [maincontroller::class, 'add_cat'])->name('add_cat');
Route::get('/admin/coupon_ad', [maincontroller::class, 'coupon'])->name('coupon_ad');
Route::post('/admin/coupon', [maincontroller::class, 'coupon_ad'])->name('coupon');
Route::get('/admin/logout', [maincontroller::class, 'logout'])->name('logout');
Route::get('/products/{id}/edit', [maincontroller::class, 'edit'])->name('products.edit');
Route::delete('/products/{id}', [maincontroller::class, 'destroy'])->name('products.destroy');
Route::get('/admin/{id}/edit_cat', [CategoryController::class, 'edit'])->name('category.edit_cat');
Route::post('/admin/update', [maincontroller::class, 'update'])->name('update');

Route::get('/admin/about-us', [maincontroller::class, 'about_us'])->name('about_us');
Route::post('/admin/about-us', [maincontroller::class, 'about_store'])->name('about_us.store');

// Route to handle the update request
Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::patch('/user/{id}/status', [maincontroller::class, 'updateStatus'])->name('update.status');
Route::delete('/category/{id}', [maincontroller::class, 'destroyc'])->name('categories.destroy');

Route::get('/admin/index', [MainController::class, 'home'])->name('adminindex');
Route::post('/admin/index/update', [MainController::class, 'updateindex'])->name('index.update');


Route::post('/admin/emails/reply/{id}', [MainController::class, 'sendReply'])->name('sendReply');
Route::get('admin/emails/reply/{id}', [MainController::class, 'showReplyForm'])->name('replyForm');


Route::post('admin/coupon_ad', [MainController::class, 'storecoupon'])->name('coupon');
Route::get('admin/coupon', [MainController::class, 'coupondetail'])->name('coupondetail');
Route::get('admin/coupon/{id}/edit', [maincontroller::class, 'edit'])->name('coupons.edit');
Route::delete('admin/coupon/{id}', [MainController::class, 'destroycoupon'])->name('coupons.destroy');


Route::get('admin/coupon/{id}/edit', [maincontroller::class, 'edit_coupon'])->name('coupons.edit');
Route::put('admin/coupon/{id}', [maincontroller::class, 'updatecoupon'])->name('coupons.update');

Route::get('/admin/add_cust', [maincontroller::class, 'add_cust'])->name('add_cust');
Route::post('/admin/add_cust/store', [maincontroller::class, 'storecust'])->name('customers.store');

Route::get('/admin/wishlist', [maincontroller::class, 'wishlist'])->name('wishlist');

Route::get('/admin/reviews', [maincontroller::class, 'reviews'])->name('reviews');
Route::delete('/reviews/{id}', [maincontroller::class, 'destroyr'])->name('reviews.destroy');

Route::post('/apply-coupon', [maincontroller::class, 'applyCoupon'])->name('apply.coupon');
Route::post('/checkout', [maincontroller::class, 'handleCheckout'])->name('checkout.handle');
Route::get('/order-success', function () {
    return view('order-success');
})->name('order.success');

Route::get('/orders', [maincontroller::class, 'order'])->name('orders.index');
Route::post('/cancel/{id}', [maincontroller::class, 'cancel'])->name('order.cancel');
Route::get('/orderdetails/{order}', [maincontroller::class, 'orderDetails'])->name('order.details');
Route::get('/admin/cart', [maincontroller::class, 'displaycart'])->name('cart');
Route::patch('/admin/{id}/update-status', [maincontroller::class, 'updateorderStatus'])->name('orders.updateStatus');


Route::get('/search', [maincontroller::class, 'search'])->name('search.index');
Route::get('/result', [maincontroller::class, 'result'])->name('search.result');

// Route::get('/error', [maincontroller::class, 'error']);
Route::get('/search', [maincontroller::class, 'checkSyntax']);
