<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to add products to your cart.');
        }

        $userId = Auth::id();

        // Validate the quantity
        $quantity = $request->input('quantity');
        if ($quantity < 1 || $quantity > 12) {
            return redirect()->back()->with('error', 'Quantity must be between 1 and 12.');
        }

        // Check if the product exists
        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Check if the product is already in the cart
        $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();

        if ($cartItem) {
            // Update the quantity if the product is already in the cart
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Add new product to the cart with the selected quantity
            $cartItem = Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        // Sync the cart with the session
        $this->syncCartSession($userId);

        return redirect()->back()->with('success', 'Product added to cart.');
    }

    /**
     * Sync the cart items in the database with the session.
     */
    private function syncCartSession($userId)
    {
        // Fetch all cart items for the user from the database
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        // Calculate total price
        $totalPrice = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        // Map cart items into an array for the session
        $sessionCart = $cartItems->mapWithKeys(function ($item) {
            return [
                $item->product_id => [
                    'id' => $item->product->id,
                    'name' => $item->product->name,
                    'price' => $item->product->price,
                    'image' => $item->product->image,
                    'quantity' => $item->quantity,
                ],
            ];
        })->toArray();

        // Store the cart and total price in the session
        session(['cart' => $sessionCart, 'total_price' => $totalPrice]);
    }



    public function remove($id)
    {
        // Find the cart item by ID
        $cartItem = Cart::find($id);

        if ($cartItem) {
            // Remove the cart item from the database
            $cartItem->delete();

            // Retrieve the cart session
            $cartSession = session('cart', []);

            // Remove the item from the session
            if (isset($cartSession[$id])) {
                unset($cartSession[$id]);
                session(['cart' => $cartSession]); // Update the session
            }

            return redirect()->back()->with('success', 'Item removed from cart.');
        }

        return redirect()->back()->with('error', 'Item could not be removed.');
    }

}
