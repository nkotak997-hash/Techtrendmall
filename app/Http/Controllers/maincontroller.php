<?php

namespace App\Http\Controllers;

use App\Exceptions\customexception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Message;
use App\Models\product;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\AboutUs;
use App\Models\Index;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\ReplyToInquiryMail;
use App\Models\Cart;
use App\Models\reviews;
use App\Models\Wishlist;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\Order;

class maincontroller extends Controller
{

    public function index()
    {
        $users = User::all();
         return view('admin.customers_ad', compact('users'));
    }
    public function dashboard()
    {
        return view('admin.dashboard_ad');
    }
    public function messages()
    {
        $messages = Message::all();
        return view('admin.messages_ad', compact('messages'));
    }
    public function view_products()
    {
        $products = Product::with('category')->get();
        return view('admin.view_products_ad', compact('products'));
    }
    public function category()
    {
        $category = Category::all();
        return view('admin.category_ad', compact('category'));
    }
    public function orders()
    {
        $orders = Order::with(['user', 'product'])->get();
        return view('admin.orders_ad', compact('orders'));
    }

    public function order_detail()
    {
        return view('admin.order_detail_ad');
    }
    public function add_pro()
    {
        $categories  = Category::all();
        return view('admin.add_pro_ad', compact('categories'));
    }

    public function destroy($id)
    {
        // Find and delete the product by ID
        $product = Product::findOrFail($id);
        $product->delete();

        // Fetch the updated list of products after deletion
        $products = Product::all();

        // Pass the products to the view
        return view('admin.view_products_ad', compact('products'));
    }

        public function store(Request $request)
    {
        $request->validate([
           'cat-name' => 'required|exists:category,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pname' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'brand' => 'required|string|max:255',
            'ram' => 'nullable|numeric|min:0',  // Allow null for optional fields
            'rom' => 'nullable|numeric|min:0',
            'processor' => 'nullable|string|max:255',
            'battery' => 'nullable|string|max:255',
            'camera' => 'nullable|string|max:255',
            'display' => 'nullable|numeric|min:0',
            'status' => 'required|boolean',  // Assuming status is a boolean (1 for active, 0 for inactive)
        ],[
            // 'pname.regex' => 'The full name must only contain letters and spaces.',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        // Create a new product and save it to the database
        Product::create([
            'category_id' => $request['cat-name'],
            'img' => $imageName,
            'name' => $request['pname'],
            'des' => $request['description'],
            'price' => $request['price'],
            'status' => $request['status'],
            'brand' => $request['brand'],
            'ram' => $request['ram'],
            'rom' => $request['rom'],
            'processor' => $request['processor'],
            'battery' => $request['battery'],
            'camera' => $request['camera'],
            'display' => $request['display'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function profile_ad()
    {
         return view('admin.profile_ad');
    }
    public function add_catagory_ad()
    {
         return view('admin.add_catagory_ad');
    }
    public function add_cat(Request $request)
    {
        $request->validate([
            'pname' => 'required|regex:/^[a-zA-Z\s]*$/',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'required|mimes:mp4,mov,webm,webp,ogg,qt|max:2000000', // Validating the video file
        ],[
            'pname.regex' => 'The category name must only contain letters and spaces.',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        if ($request->hasFile('video')) {
            $videoName = time() . '.' . $request->video->extension();
            $request->video->move(public_path('images'), $videoName);
        }

        Category::create([
            'name' => $request['pname'],
            'img' => $imageName,
            'video' => $videoName,  // Save the video name in the category table
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Category added successfully!');
    }
    public function destroyc($id)
{
    // Find the category by its ID
    $category = Category::findOrFail($id);

    // Delete the category
    $category->delete();

    // Redirect back with a success message
    return view('admin.category_ad');
}
    public function coupon()
    {
         return view('admin.coupon_ad');
    }
    public function coupon_ad(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:coupons,code',
            'type' => 'required|in:percentage,fixed',
            'amount' => 'required|numeric',
            'min_purchase_amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'usage_limit' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        return view('admin.coupon_ad');
    }
    public function logout()
    {
        // Log the user out
        Auth::logout();
        // Redirect to the login page or homepage
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }

    public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all(); // Assuming you have a Category model
    return view('admin.edit_pro', compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required',
        // Add other validation rules as needed
    ]);

    $product = Product::findOrFail($id);
    $product->name = $request->name;
    $product->des = $request->des;
    $product->category_id = $request->category_id;
    $product->brand = $request->brand;
    $product->ram = $request->ram;
    $product->rom = $request->rom;
    $product->processor = $request->processor;
    $product->battery = $request->battery;
    $product->camera = $request->camera;
    $product->display = $request->display;
    $product->price = $request->price;
    $product->status = $request->status;

    if ($request->hasFile('img')) {
        $imageName = time().'.'.$request->img->extension();
        $request->img->move(public_path('images'), $imageName);
        $product->img = $imageName;
    }

    $product->save();

    return redirect()->route('admin.view_products_ad')->with('success', 'Product updated successfully');
}
public function updateStatus(Request $request, $id)
{
    $user = User::find($id);
    $user->status = $request->input('status');
    $user->save();

    return redirect()->back()->with('success', 'Status updated successfully');
}
    public function about_us()
    {
        // Fetch existing About Us data
        $aboutUs = AboutUs::first(); // Assuming there's only one entry

        return view('admin.about_us', data: compact('aboutUs'));
    }

    public function about_store(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image can be nullable
            'des' => 'required',
        ]);

        $data = [
            'des' => $request->des,
        ];

        // Handle the image upload only if it's provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName; // Only set 'image' in the $data array if a new image is uploaded
        }

        // Create or update the About Us entry
        AboutUs::updateOrCreate(
            ['id' => 1], // Assuming there's only one entry
            $data // Pass the $data array containing 'des' and optionally 'image'
        );

        return redirect()->back()->with('success', 'About Us updated successfully!');
    }

    public function home()
    {
        $index = Index::all();
         return view('admin.index', compact('index'));
    }

    public function updateindex(Request $request)
{
    $request->validate([
        'video' => 'nullable|mimes:mp4,mkv,webm,avi', // Allow video formats and set max size
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Allow image formats and set max size
    ]);

    $index = Index::findOrFail($request->id); // Find the record by id (make sure id is passed)

    // Handle video upload
    if ($request->hasFile('video')) {
        // Delete the current video if a new one is uploaded
        if ($index->video) {
            Storage::delete('images/' . $index->video);
        }

        $videoName = time() . '.' . $request->video->extension();
        $request->video->move(public_path('images'), $videoName);
        $index->video = $videoName;
    }

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete the current image if a new one is uploaded
        if ($index->image) {
            Storage::delete('images/' . $index->image);
        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $index->image = $imageName;
    }

    $index->save(); // Save the updated record

    return redirect()->route('adminindex')->with('success', 'Image and Video updated successfully');
}

public function sendReply(Request $request, $id)
{
    // Get the message by ID
    $message = Message::find($id);

    if (!$message) {
        return redirect()->back()->with('error', 'Message not found.');
    }

    // Get the reply from the form
    $replyContent = $request->input('reply');

    // Store the reply in the messages table
    $message->reply = $replyContent;
    $message->save(); // Save the updated message

    // Send the reply via email
    Mail::send('admin.emails.contactreply', [
        'contact' => $message, // Pass the message object
        'replyContent' => $replyContent // Pass the reply content
    ], function ($mail) use ($message): void {
        $mail->to($message->email)->subject('Reply to your message');
        $mail->from('techtrendmall111@gmail.com', 'TechTrendMall');
    });

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Reply sent successfully!');
}

public function showReplyForm($id)
{
    $message = Message::find($id); // Find the message by ID
    return view('admin.emails.reply', compact('message'));
}

public function storecoupon(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'code' => 'required|string|max:255|unique:coupons',
        'discount' => 'required|integer', // Discount should be an integer for percentage
        'expires_at' => 'required|date|after:today', // Expiration date should be a future date
    ]);

    // Create the coupon
    Coupon::create([
        'code' => $validatedData['code'],
        'discount' => $validatedData['discount'],
        'expires_at' => $validatedData['expires_at'],
    ]);

    // Redirect or return a response
    return redirect()->route('coupondetail')->with('success', 'Coupon saved successfully!');
}


    public function coupondetail()
    {
        $coupons = Coupon::all(); // Fetch all coupons
        return view('admin.coupon', compact('coupons')); // Pass the coupons to the view
    }

    public function edit_coupon($id)
    {
        $coupon = Coupon::findOrFail($id); // Find the coupon or fail
        return view('admin.edit_coupon', compact('coupon')); // Pass coupon to the edit view
    }

    // Update the specified coupon in storage
    public function updatecoupon(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'code' => 'required|string|max:255|unique:coupons,code,' . $id, // Ensure unique code for the current coupon
            'discount' => 'required|integer', // Discount should be an integer for percentage
            'expires_at' => 'required|date|after:today', // Expiration date should be a future date
        ]);

        // Find the coupon and update it
        $coupon = Coupon::findOrFail($id);
        $coupon->update([
            'code' => $validatedData['code'],
            'discount' => $validatedData['discount'],
            'expires_at' => $validatedData['expires_at'],
        ]);

        // Redirect or return a response
        return redirect()->route('coupondetail')->with('success', 'Coupon updated successfully!');
    }

    // Remove the specified coupon from storage
    public function destroycoupon($id)
{
    $coupon = Coupon::findOrFail($id);
    $coupon->delete(); // Delete the coupon

    // Redirect or return a response
    return redirect()->route('coupondetail')->with('success', 'Coupon deleted successfully!');
}

    public function add_cust()
    {
        return view('admin.add_cust');

    }

    public function storecust(Request $request)
    {
        // Validation with custom error messages
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'pn' => 'required|string|max:15|unique:users,pn',
            'role' => 'required|string',
            'status' => 'required|string|in:active,inactive',
            'password' => 'required|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/|confirmed',
            'p_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'password.regex' => 'The password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        // Create new user instance
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->pn = $request->pn;
        $user->role = $request->role;
        // $user->status = $request->status;
        $user->password = Hash::make('defaultpassword'); // Set a default password or customize this
        // Save the user record to the database
        $user->save();

        return redirect()->back()->with('success', 'Customer added successfully!');
    }
    public function wishlist()
    {
        $wishlists = Wishlist::with(['user', 'product'])->get();
         return view('admin.wishlist', compact('wishlists'));
    }

    public function reviews()
    {
        $reviews = reviews::all(); // Replace 'Review' with your model name
        return view('admin.reviews', compact('reviews'));
    }
    public function destroyr($id)
    {
        $review = reviews::findOrFail($id);
        $review->delete();
        return redirect()->route('reviews')->with('success', 'Review deleted successfully.');
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string'
        ]);

        $coupon = Coupon::where('code', $request->coupon_code)
            ->where('expires_at', '>=', now())
            ->first();

        if (!$coupon) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid or expired coupon'
            ], 400);
        }

        $cartItems = session('cart', []);

        if (empty($cartItems)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cart is empty'
            ], 400);
        }

        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $discount = ($coupon->discount / 100) * $totalPrice;
        $discountedPrice = max($totalPrice - $discount, 0);

        session([
            'total_price' => $totalPrice,
            'discounted_price' => $discountedPrice
        ]);

        return response()->json([
            'status' => 'success',
            'message' => "Coupon applied! You saved ₹" . number_format($discount, 2),
            'original_price' => number_format($totalPrice, 2),
            'discounted_price' => number_format($discountedPrice, 2),
        ]);
    }


    public function pay(Request $request)
    {
        $input = $request->all();
        $api = new Api("rzp_test_FUijwPsI1t6dUR", "jRnoTlr33KFYLVmWfEf1zNvq");

        $paymentId = $input['razorpay_payment_id'] ?? null;
        $amount = $request->input('amount');

        if ($paymentId) {
            try {
                // Capture the payment
                $response = $api->payment->fetch($paymentId)->capture([
                    'amount' => $amount // Amount in paise
                ]);

                Session::put('success', 'Payment successful');
                return redirect()->route('success.page');
            } catch (Exception $e) {
                Session::put('error', $e->getMessage());
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }

        Session::put('error', 'Payment failed. Try again.');
        return redirect()->back();
    }

    // use App\Models\CartItem;

    public function handleCheckout(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'city' => 'required|string|max:255',
            'address' => 'required|string',
            'payment_method' => 'required|string',
            'payment_id' => 'nullable|string',
        ]);

        $user = Auth::user();
        $cartItems = session('cart', []);
        $productNames = collect($cartItems)->pluck('name')->implode(', '); // Retrieve product names
        $productIds = collect($cartItems)->pluck('id')->implode(', '); // Retrieve product IDs
        $totalPrice = session('discounted_price', 0); // Use discounted price from session

        Order::create([
            'user_id' => $user->id,
            'username' => $validated['username'],
            'product_name' => $productNames,
            'product_ids' => $productIds, // Store product IDs
            'total_price' => $totalPrice,
            'city' => $validated['city'],
            'address' => $validated['address'],
            'payment_method' => $validated['payment_method'],
            'payment_id' => $validated['payment_method'] === 'cod' ? 'COD' : $validated['payment_id'], // Set to 'COD' if the payment method is COD
            'status' => 'ordered',
        ]);

        // Remove items from cart in database
        Cart::where('user_id', $user->id)->delete();

        // Clear the cart session
        session()->forget('cart');

        return redirect()->route('order.success')->with('success', 'Order successfully placed!');
    }



public function order()
{
    // Retrieve orders for the authenticated user with related product details
    $orders = Order::with('product')->where('user_id', Auth::id())->get();

    return view('orders', compact('orders'));
}

public function cancel($id)
{
    $order = Order::find($id);

    if (!$order) {
        return response()->json(['success' => false, 'message' => 'Order not found']);
    }

    if (in_array($order->status, ['Shipped', 'Delivered'])) {
        return response()->json(['success' => false, 'message' => 'Cannot cancel shipped or delivered orders']);
    }

    // Update the status to "Cancelled"
    $order->status = 'Cancelled';
    $order->save();

    // return response()->json(['success' => true, 'message' => 'Order cancelled successfully']);
    return redirect()->route('orders.index')->with('success', 'Order cancelled successfully');
}

public function orderDetails($orderId)
{
    $order = Order::findOrFail($orderId);
    $productNames = explode(', ', $order->product_name); // Split product names

    // Fetch products by their names
    $products = Product::whereIn('name', $productNames)->get();

    return view('orderdetails', compact('order', 'products'));
}

public function displaycart()
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    $carts = Cart::with(['user', 'product'])->get();

    return view('admin.cart', compact('carts'));
}

public function updateorderStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string|in:Ordered,Processing,Ready for Delivery,Delivered,Cancelled'
    ]);

    $order = Order::findOrFail($id);

    $order->status = $request->status;
    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully!');
}
// public function result(Request $request)
// {
//     try {
//         $user = User::findOrFail($request->user_id);
//         return view('result', compact('user'));
//     } catch (ModelNotFoundException $exception) {
//         return back()->withError('User with ID: ' . $request->user_id . ' not found!')->withInput();
//     }
// }

// public function search()
// {
//     return view('search');
// }

// public function error()
// {
//     return view('error');
// }

    // public function checkSyntax()
    //     {
    //         try {
    //             $Path = app_path('Http/Controllers/maincontroller.php');

    //             if ($this->hasSyntaxError($Path)) {
    //                 throw new customexception("Syntax Error: Something Missing detected in Controller.");
    //             }
    //             return "No syntax errors found!";
    //         } catch (customexception $e) {
    //             return response()->view('error', ['message' => $e->getMessage()], 500);
    //         }
    //     }

        // private function hasSyntaxError($filePath)
        // {
        //     $code = file_get_contents($filePath);
        //     $code = ' ?';

        //     $tokens = token_get_all($code);
        //     $isStatementEnd = false;

        //     foreach ($tokens as $token) {
        //         if (is_array($token)) {
        //             [$id, $text] = $token;

        //             if (in_array($id, [T_RETURN, T_ECHO, T_PRINT, T_FUNCTION, T_VARIABLE])) {
        //                 $isStatementEnd = true;
        //             }
        //         } else {
        //             if ($text === ';') {
        //                 $isStatementEnd = false;
        //             }
        //         }
        //     }
        //     return $isStatementEnd;
        // }
}
