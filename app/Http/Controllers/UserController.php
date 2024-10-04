<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\PromoEmail;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{ 
    public function login() {
        if(Auth::guest()){
            return view('auth.login');
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function loginUser(Request $request) {
        $credentials = $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:8',
        ]);

        if(Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid credentials'])->withInput($request->only('error'));
        }
    }

    public function dashboard() {
        $totalProducts = Product::count();
        $totalcategories = Category::count();
        $totalMembers = OurTeam::count();
        $promo_emails = PromoEmail::count();
        $products = Product::orderBy('created_at', 'DESC')->take(10)->get();
        return view('admin.dashboard', compact('products', 'totalProducts', 'totalcategories', 'totalMembers', 'promo_emails'));
    }

    public function register() {
        if(Auth::guest()){
            return view('auth.register');
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function registerUser(Request $request) {
        $userData = $request->validate([
            'username' => 'required | min:3 | max: 15',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8 | confirmed',
        ]);

        $user = new User();
        $user->username = $userData['username'];
        $user->email = $userData['email'];
        $user->password = bcrypt($userData['password']);
        $user->save();
        return redirect()->route('login')->with('status', 'User has been created successfully');
        
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
