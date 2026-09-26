<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();
        // Retrieve the user's wishlist with the associated products
        $wishlists = $user->wishlist()->with('product')->get();
        // Return the wishlist view with the retrieved data
        return view('wishlist.index', compact('wishlists'));
    }

    /**
     * Add a product to the user's wishlist.
     */
    public function addToWishlist($productId)
    {
        $user = Auth::user();

        // Check if the product is already in the user's wishlist
        if ($user->wishlist()->where('product_id', $productId)->exists()) {
            return redirect()->back()->with('message', 'Already in wishlist');
        }

        // Add the product to the wishlist
        $user->wishlist()->create(['product_id' => $productId]);

        // Return with success message
        return redirect()->back()->with('message', 'Added to wishlist');
        $product = Product::findOrFail($productId);

        // Add the product to the user's wishlist, including image and description
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'image' => $product->image,       // Assuming 'image' is a field on the Product model
            'description' => $product->description, // Assuming 'description' is a field on the Product model
        ]);

        return redirect()->route('wishlist.index');
    }

    public function removeFromWishlist($productId)
    {
        $user = Auth::user();
        // Remove the product from the wishlist
        $user->wishlist()->where('product_id', $productId)->delete();

        // Return with success message
        return redirect()->back()->with('message', 'Removed from wishlist');
    }

}
