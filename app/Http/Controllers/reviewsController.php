<?php

namespace App\Http\Controllers;

use App\Models\reviews;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class reviewsController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'rating' => 'required|integer|between:1,5',

    ]);

    reviews::create([
        'user_id' => auth()->id(),
        'product_id' => $request->product_id,
        'rating' => $request->rating,
        'message' => $request->message,
    ]);

    return redirect()->back()->with('success', 'Thank you for your review!');
}


public function resultdisplay(){
    $users = User::all();
    return view('result', compact('users'));
}


// ---------------------------

}
