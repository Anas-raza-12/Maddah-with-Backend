<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{

    public function wishlist()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())
                                ->with('product')
                                ->get();

        // Add is_in_wishlist flag to each product dynamically
        foreach ($wishlistItems as $item) {
            $item->product->is_in_wishlist = true; // This product is in the wishlist

            // Check if this product is in the wishlist, set is_in_wishlist
            if (!DB::table('wishlists')->where('user_id', Auth::id())->where('product_id', $item->product->id)->exists()) {
                $item->product->is_in_wishlist = false; // Not in wishlist
            }
        }

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('wishlist', compact('wishlistItems', 'wishlistCount'));
    }
    
    // Add to Wishlist
    public function add(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->input('product_id');

        // Check if the product is not already in the wishlist
        $exists = DB::table('wishlists')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->exists();

        if (!$exists) {
            // Add product to wishlist
            DB::table('wishlists')->insert([
                'user_id' => $userId,
                'product_id' => $productId
            ]);
        } else {
            return response()->json(['message' => 'Product already in wishlist!', 'newWishlistCount' => DB::table('wishlists')->where('user_id', $userId)->count()], 400);
        }

        // Get updated wishlist count
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return response()->json(['message' => 'Product added to wishlist!', 'newWishlistCount' => $wishlistCount]);
    }

    // Remove from Wishlist
    public function remove(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->input('product_id');

        // Remove product from wishlist
        DB::table('wishlists')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->delete();

        // Get updated wishlist count
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return response()->json(['message' => 'Product removed from wishlist!', 'newWishlistCount' => $wishlistCount]);
    }


    public function moveToCart()
    {
        $userId = Auth::id();
        
        // Fetch all wishlist items for the user
        $wishlistItems = Wishlist::where('user_id', $userId)->with('product')->get();

        // Loop through all items and add them to the cart
        foreach ($wishlistItems as $item) {
            // You can adjust the structure of how you want to store items in the cart, this is just a simple example
            $cart = Session::get('cart', []);
            dd($cart);
            $cart[$item->product->id] = [
                'id' => $item->product->id,
                'name' => $item->product->title,
                'price' => $item->product->price,
                //'regularPrice' => $item->product->regular_price,
                //'salePrice' => $item->product->sale_price,
                'quantity' => 1, // Set default quantity to 1
                'image' => $item->product->featured_image
            ];
            Session::put('cart', $cart);
        }

        // Optional: Remove items from the wishlist after moving them to the cart
        Wishlist::where('user_id', $userId)->delete();

        return response()->json(['success' => true]);
    }

}
