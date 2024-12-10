<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->orderBy('created_at', 'DESC')->take(5)->get();
        $products = Product::orderBy('created_at', 'DESC')
                ->paginate(10);

        foreach ($products as $product) {
            $product->is_in_wishlist = DB::table('wishlists')
                ->where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->exists();
        }

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('shop', compact('categories', 'products', 'wishlistCount'));
    }

    public function productDetail($product_slug) {
        $products = Product::where('slug', $product_slug)->first();
        $relatedProducts = Product::where('slug','<>',$product_slug)->get()->take(5);

        // Check if each product is in the wishlist
        foreach ($relatedProducts as $product) {
            $product->is_in_wishlist = DB::table('wishlists')
                ->where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->exists();
        }

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('product-detail', compact('products', 'relatedProducts', 'wishlistCount'));
    }
}
