<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Validate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cart;
use App\Models\Message;
use App\Models\product;
use App\Models\Category;
use App\Models\AboutUs;
use App\Models\Index;

class samplecontroller extends Controller
{
    //

    public function index(){
        $categories = Category::all();
        $video = Index::all(); // Fetch the first video entry from the database
        return view('index', compact('categories','video'));
    }
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    // Validate the input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:3|max:20',
    ], [
        'email.email' => 'The email must be a valid email address.',
        'password.min' => 'The password must be between 3 and 20 digits.',
        'password.max' => 'The password must be between 3 and 20 digits.',
    ]);

    // Retrieve the user by email
    $user = User::where('email', $request->email)->first();

    // Check if the user exists, the password is correct, and the user is active
    if ($user && Hash::check($request->password, $user->password)) {
        if ($user->status == 'inactive') {
            return back()->withErrors([
                'email' => 'Your account is inactive. Please contact support.',
            ]);
        }

        // Log the user in
        Auth::login($user);

        // Check the user's role and redirect accordingly
        if ($user->role == 'admin') {
            return redirect()->route('dashboard')->with('success', 'Login successful! Welcome, Admin!');
        } else {
            return redirect()->route('index')->with('success', 'Login successful! Welcome!');
        }
    } else {
        // Redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided email or password do not match our records.',
        ]);
    }
}




    public function logout()
    {
        // Log the user out
        Auth::logout();

        // Redirect to the login page or homepage
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
    public function showForm()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]*$/',
            'email' => 'required|email',
            'message' => [
                'required',
                function ($attribute, $value, $fail) {
                    $wordCount = str_word_count($value);
                    if ($wordCount < 5) {
                        $fail('The message must be at least 5 words.');
                    } elseif ($wordCount > 30) {
                        $fail('The message must not be more than 30 words.');
                    }
                },
            ],
        ], [
            'name.regex' => 'The name must only contain letters and spaces.',
            'email.email' => 'The email must be a valid email address.',
        ]);
        Message::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'message' => $request['message'],
        ]);

        // Handle form submission
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function navbar(){
        return view('navbar');
    }
    public function product()
    {
        $categories = Category::all();
        return view('product', compact('categories'));
    }
    public function show_product($id)
    {
        // Fetch the category by ID
        $category = Category::findOrFail($id);

        // Fetch all products that belong to this category
        $products = Product::where('category_id', $id)->get();

        // Return the product view with the category and its products
        return view('show_product', compact('category', 'products'));
    }


    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }


    public function forgot()
    {
        return view('forgot');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }


    public function add_to_cart()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        $cartItems = Cart::with('product')->get(); // Fetch all cart items and their corresponding product details
        return view('add_to_cart' ,compact('cartItems'));
    }
   // In your controller
   public function remove($id)
{
    $cartItem = Cart::find($id);
    if ($cartItem) {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Item removed from cart.');
    }
    return redirect()->back()->with('error', 'Item could not be removed.');
}



    public function offer()
    {
        return view('offer');
    }

    public function show($id)
{
    // Fetch the product by ID
    $product = Product::findOrFail($id);

    // Return the product details view with the product data
    return view('product_details', compact('product'));
}

public function edit($id)
{
    $user = User::find($id);
    return view('edit_profile', compact('user'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'pn' => 'required|string|max:20',
        'p_img' => 'nullable|image|max:50000', // Profile image validation
    ]);

    // Find the user by ID
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'User not found.');
    }

    // Update profile image if a new one is uploaded
    if ($request->hasFile('p_img')) {
        $image = $request->file('p_img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Move the uploaded file to the public/images directory
        $image->move(public_path('images'), $imageName);

        // Optional: Delete old image if needed
        if ($user->p_img && file_exists(public_path('images/' . $user->p_img))) {
            unlink(public_path('images/' . $user->p_img));
        }

        // Save new image name
        $user->p_img = $imageName;
    }

    // Update other fields
    $user->name = $request->name;
    $user->email = $request->email;
    $user->pn = $request->pn;

    // Save the updated user record
    $user->save();

    // Redirect back with success message
    return redirect()->route('profile', $user->id)->with('success', 'Profile updated successfully.');
}

// Display the change password form
public function showChangePasswordForm()
{
    return view('change-password');
}

// Handle the password change request
public function changePassword(Request $request)
{
    // Validate input fields
    $request->validate([
        'current_password' => ['required', 'string', 'min:8'],
        'new_password' => ['required', 'string', 'min:8', 'different:current_password'],
        'confirm_password' => ['required', 'same:new_password'],
    ]);

    // Check if the current password matches the user's existing password
    if (!Hash::check($request->current_password, Auth::user()->password)) {
        return back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    // Update the user's password
    Auth::user()->update([
        'password' => Hash::make($request->new_password),
    ]);

    return back()->with('success', 'Password changed successfully.');
}
public function showAboutPage() {
    // Fetching the first record of the about_us table
    $aboutUs = AboutUs::first();

    // Passing the data to the view
    return view('about', compact('aboutUs'));
}

public function showVideo()
{
    $video = Index::all(); // Fetch the first video entry from the database
    return view('index', compact('video')); // Pass the video to the view
}


// public function result(Request $request)
// {
//     try {
//         $user = User::findOrFail($request->user_id);

//         return view('result', compact('user'));
//     } catch (ModelNotFoundException $exception) {
//         return back()->withError('User with ID: '.$request->user_id.' not found!')->withInput();
//     } catch (RelationNotFoundException $exception) {
//         return back()->withError($exception->getMessage())->withInput();
//     }
// }
}
