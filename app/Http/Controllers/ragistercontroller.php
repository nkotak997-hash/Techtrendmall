<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\product;
use Illuminate\Support\Facades\Hash;
use App\Mail\VerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ragistercontroller extends Controller
{
    //

    public function showForm()
    {
        return view('register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'full_name' => 'required|regex:/^[a-zA-Z\s]*$/',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|digits:10|unique:users,pn',
            'password' => 'required|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/|confirmed',
            'p_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'full_name.regex' => 'The full name must only contain letters and spaces.',
            'email.email' => 'The email must be a valid email address.',
            'phone_number.digits' => 'The phone number must be 10 digits.',
            'password.regex' => 'The password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'password.confirmed' => 'The password confirmation does not match.',
            'p_img' => 'The Profile Image is Required.'
        ]);

        $user = new User;
        $user->name = $request->full_name;
        $user->email = $request->email;
        $user->pn = $request->phone_number;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('p_img')) {
            $image = $request->file('p_img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Move the uploaded file to the public/images directory
            $image->move(public_path('images'), $imageName);

            // Save the image name in the database
            $user->p_img = $imageName;
        } else {
            // Set a default image if no file is uploaded
            $user->p_img = 'default_image.jpg'; // Use the name of your default image
        }

        // Save the user record
        $user->save();


        $token = Str::random(60);
        $user->token = $token;


        if ($user->save()) {
            // $request->pic->move("images/profile_pictures/", $profile_pic);

            $data = array('name' => $request->name, 'email' => $request->email, 'token' => $token);
            Mail::Send('create_account_mail', ["data1" => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name']);
                $message->from("techtrendmall111@gmail.com", "TechTrendMall");
            });
            session()->flash('success', 'Registration successfull and a verification link is sent to registered email address');
            return redirect('login');
        } else {
            session()->flash('error', 'Error in Registration');
            return redirect('register');
        }

        // return redirect()->route('Register')->with('success', 'Registration successful!');
        
    }
    public function verify_email($email, $token)
    {
        $result = User::whereEmail($email)->where('token', $token)->first();

        if (empty($result)) {
            session()->flash('error', 'Your account is not registered. Kindly register here.');
            return redirect('register');
        } else {
            if ($result->status == 'Active') {
                session()->flash('success', 'Your account is already activated kindly login');
            } else {
                $update = user::where('email', $email)->update(array('status' => 'Active'));
                if ($update) {
                    session()->flash('success', 'Your account is activated successfully.');
                } else {
                    session()->flash('error', 'Account activation failed please try after sometime.');
                }
            }
            return redirect('login');
        }
    }

    public function search(Request $request) {
        $query = $request->input('query');

        // Search for a single product that matches the name or description
        $product = Product::where('name', 'like', '%' . $query . '%')
                          ->orWhere('des', 'like', '%' . $query . '%')
                          ->first();

        if (!$product) {
            // Redirect or show a message if no product is found
            return redirect()->back()->with('error', 'No product found');
        }

        return view('product_details', compact('product'));
    }

}


