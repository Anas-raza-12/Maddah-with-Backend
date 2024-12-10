<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function index()
    {;

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('user.myaccount', compact('wishlistCount'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'mobile' => 'required|string|max:15|unique:users,mobile,' . $user->id,
        ]);

        $updated = false;
        if ($request->username !== $user->username) {
            $user->username = $request->username;
            $updated = true;
        }

        if ($request->mobile !== $user->mobile) {
            $user->mobile = $request->mobile;
            $updated = true;
        }

        if ($updated) {
            $user->save();
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('info', 'No changes were made.');
        }
    }

    public function changePassword()
    {

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('user.change-password', compact('wishlistCount'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }


    public function orders()
    {
        
        $orders = Order::with('items')
                    ->where('user_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

        $totalOrders = Order::where('user_id', auth()->id())->count();

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('user.orders', compact('orders', 'totalOrders', 'wishlistCount'));
    }


    public function orderDetail($orderId)
    {
        
        $user = auth()->user();

        $order = Order::with('items')->where('id', $orderId)->where('user_id', $user->id)->firstOrFail();

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('user.order-detail', compact('order', 'wishlistCount'));
    }


    // public function cancelOrder(Request $request, $orderId)
    // {
    //     $order = Order::findOrFail($orderId);

    //     if ($order->status === 'canceled') {
    //         return redirect()->back()->with('error', 'Order has already been canceled.');
    //     }

    //     $order->status = 'canceled';
    //     $order->canceled_date = now();
    //     $order->save();

    //     return redirect()->back()->with('success', 'Order has been canceled successfully.');
    // }

}
