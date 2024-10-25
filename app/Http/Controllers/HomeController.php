<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\PromoEmail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $saleproducts = Product::whereNotNull('sale_price')
                                ->where('sale_price', '<', 'regular_priceprice')         
                                ->orderByRaw('(regular_price - sale_price) DESC')
                                ->take(10)
                                ->get();
        $topSaleProducts = Product::whereNotNull('sale_price')
                                    ->where('sale_price', '<', 'regular_priceprice')
                                    ->orderByRaw('(regular_price - sale_price) DESC')
                                    ->take(2)
                                    ->get();
        return view('index', compact('saleproducts', 'topSaleProducts'));
    }
    
    public function about() {
        $members = OurTeam::orderBy('created_at')->take(3)->get();
        return view('about', compact('members'));
    }

    public function contact() {
        $categories = Category::withCount('products')->orderBy('created_at', 'DESC')->get();
        return view('contact');
    }

    public function category() {
        $categories = Category::withCount('products')->orderBy('created_at', 'DESC')->get();
        return view('category', compact('categories'));
    }

    public function wishlist() {
        return view('wishlist');
    }

    public function cart() {
        return view('cart');
    }

    public function checkout() {
        return view('checkout');
    }

    public function myaccount() {
        return view('myaccount');
    }

    public function orderDetail() {
        return view('order-detail');
    }

    public function orderConfirmation() {
        return view('order-confirmation');
    }

    public function Error404() {
        return view('404-error');
    }

    public function promoEmails(Request $request)
    {
        // Validate the email to be required, valid, and unique
        $request->validate([
            'email' => 'required|email|unique:promo_emails,email',
        ]);

        // Save the email to the database if validation passes
        $promo_email = new PromoEmail();
        $promo_email->email = $request->email;
        $promo_email->save();

        // Redirect with success message
        return redirect()->route('home')->with('success', 'Your Email has been saved successfully');
    }


}
