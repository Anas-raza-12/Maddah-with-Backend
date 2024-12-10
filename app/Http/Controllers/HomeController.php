<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Category;
use App\Models\PromoEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() 
    {
        // Fetch the sale products
        $saleproducts = Product::whereNotNull('sale_price')
            ->where('sale_price', '<', 'regular_price')         
            ->orderByRaw('(regular_price - sale_price) DESC')
            ->take(10)
            ->get();

        // Fetch the top sale products
        $topSaleProducts = Product::whereNotNull('sale_price')
            ->where('sale_price', '<', 'regular_price') // Fixed typo in the second condition
            ->orderByRaw('(regular_price - sale_price) DESC')
            ->take(2)
            ->get();

        // Check if each product is in the wishlist
        foreach ($saleproducts as $product) {
            $product->is_in_wishlist = DB::table('wishlists')
                ->where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->exists();
        }

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('index', compact('saleproducts', 'topSaleProducts', 'wishlistCount'));
    }

    
    public function about() 
    {

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('about', compact('wishlistCount'));
    }

    public function contact() 
    {

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        $categories = Category::withCount('products')->orderBy('created_at', 'DESC')->get();
        return view('contact', compact('wishlistCount'));
    }

    public function category() 
    {

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        $categories = Category::withCount('products')->orderBy('created_at', 'DESC')->get();
        return view('category', compact('categories', 'wishlistCount'));
    }

    public function categoryFilter($category_slug = null)
    {
        $categories = Category::withCount('products')->orderBy('created_at', 'DESC')->take(5)->get();

        if ($category_slug) {
            $category = Category::where('slug', $category_slug)->firstOrFail();
            $products = Product::where('category_id', $category->id)
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        } else {
            $products = Product::orderBy('created_at', 'DESC')->paginate(10);
            $category = null;
        }

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('shop', compact('categories', 'products', 'category', 'wishlistCount'));
    }

    public function Error404() {
        return view('404');
    }

    public function promoEmails(Request $request)
    {
        // Validate the email to be required, valid, and unique
        $request->validate([
            'promo_email' => 'required|email|unique:promo_emails,email',
        ]);

        // Save the email to the database if validation passes
        $promo_email = new PromoEmail();
        $promo_email->email = $request->promo_email;
        $promo_email->save();

        // Redirect with success message
        return redirect()->route('home')->with('success', 'Your Email has been saved successfully');
    }


}
