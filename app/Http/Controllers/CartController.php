<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $product = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'regularPrice' => $request->regularPrice,
            'salePrice' => $request->salePrice,
            'image' => $request->image,
            'quantity' => 1
        ];

        $cart = Session::get('cart', []);
        $cart[$product['id']] = $product;
        Session::put('cart', $cart);

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    public function viewCart() {
        $cart = Session::get('cart', []);

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();
        
        return view('cart', compact('wishlistCount'),['cart' => $cart]);
    }

    // public function updateQuantity(Request $request) {
    //     $cart = Session::get('cart', []);
    //     $cart[$request->id]['quantity'] = $request->quantity;
    //     Session::put('cart', $cart);

    //     return response()->json(['success' => true, 'cart' => $cart]);
    // }

    public function removeFromCart(Request $request) {
        $cart = Session::get('cart', []);
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]); // Remove the product from the cart
        }
        Session::put('cart', $cart); // Update the session cart
    
        return response()->json(['success' => true, 'cart' => $cart]);
    }
    
    public function checkout(Request $request)
    {
        $userId = Auth::id();
        
        // Retrieve the cart from the session
        $cart = Session::get('cart', []);

        // Redirect if the cart is empty
        if (empty($cart)) {
            return redirect()->route('cart.view');
        }

        // Get the latest order if exists
        $order = Order::where('user_id', $userId)->latest()->first();

        // Retrieve subtotal from request
        $subtotal = $request->input('subtotal', 0);

        // Retrieve and update quantities for each product in the cart
        $quantities = $request->input('quantity', []); 

        foreach ($quantities as $productId => $quantity) {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = (int)$quantity;
            }
        }

        // Save the updated cart back to the session
        Session::put('cart', $cart);

        // Retrieve user address details from the latest order, if available
        $street_address = $order ? $order->street_address : '';
        $appartment_floor = $order ? $order->appartment_floor : '';
        $state_city = $order ? $order->state_city : '';

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('checkout', compact('subtotal', 'street_address', 'appartment_floor', 'state_city', 'wishlistCount'));
    }


    public function PlaceAnOrder(Request $request)
    {
        $user_id = Auth::user()->id;

        $request->validate([
            'name' => 'required|max:100',
            'street_address' => 'required',
            'appartment_floor' => 'required',
            'state_city' => 'required',
            'mobile' => 'required|max:13',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric'
        ]);

        // Store order data temporarily in the session
        $cart = Session::get('cart', []);

        $orderData = [
            'user_id' => $user_id,
            'subtotal' => $request->subtotal,
            'discount' => 0,
            'total' => $request->total,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'street_address' => $request->street_address,
            'appartment_floor' => $request->appartment_floor,
            'state_city' => $request->state_city,
            'cart' => $cart
        ];

        Session::put('orderData', $orderData);

        return redirect()->route('bank.accounts');
    }


    public function bankAccounts()
    {
        // Check if order data exists in the session
        $orderData = Session::get('orderData');
        if (!$orderData) {
            return redirect()->route('home'); // Redirect to home if no order data is found
        }

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('bank-accounts', compact('wishlistCount'));
    }

    public function bankDetails($bank)
    {
        $bankDetails = $this->getBankDetails($bank);

        // Check if order data exists in the session
        $orderData = Session::get('orderData');
        if (!$orderData) {
            return redirect()->route('home'); // Redirect to home if no order data is found
        }

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();

        return view('bank-details', compact('bankDetails', 'orderData', 'wishlistCount'));
    }


    private function getBankDetails($bank)
    {
        $bankDetails = [
            'meezan' => [
                'title' => 'Meezan Bank',
                'account_title' => 'Meezan Bank',
                'account_number' => '11121323-32432-2322',
                'iba_number' => '11121323-32432-2322',
                'branch_name' => 'Meezan Bank',
                'logo' => 'meezan-bank-logo-04 2.png',
            ],
            'jazz-cash' => [
                'title' => 'Jazz Cash',
                'account_title' => 'Jazz Cash',
                'account_number' => '2345234-2434234-234',
                'iba_number' => '2345234-2434234-234',
                'branch_name' => 'Jazz Branch',
                'logo' => 'Jazz-cash-logo-vector-scaled 1.png',
            ],
            'easypaisa' => [
                'title' => 'Easy Paisa',
                'account_title' => 'Easy Paisa',
                'account_number' => '2345234-2434234-234',
                'iba_number' => '2345234-2434234-234',
                'branch_name' => 'Easy Paisa Branch',
                'logo' => 'unnamed 1.png',
            ],
            'allied-bank' => [
                'title' => 'Allied Bank',
                'account_title' => 'Allied Bank',
                'account_number' => '2345234-2434234-234',
                'iba_number' => '2345234-2434234-234',
                'branch_name' => 'Allied Bank Branch',
                'logo' => 'Allied-Bank 1.png',
            ],
            'nayapay' => [
                'title' => 'Naya Pay',
                'account_title' => 'Naya Pay',
                'account_number' => '2345234-2434234-234',
                'iba_number' => '2345234-2434234-234',
                'branch_name' => 'Naya Pay Branch',
                'logo' => 'images 2.png',
            ],
            'nbp-bank' => [
                'title' => 'NBP Bank',
                'account_title' => 'NBP Bank',
                'account_number' => '2345234-2434234-234',
                'iba_number' => '2345234-2434234-234',
                'branch_name' => 'NBP Branch',
                'logo' => 'images 1.png',
            ],
            'habib-bank' => [
                'title' => 'Habib Bank',
                'account_title' => 'Habib Bank',
                'account_number' => '2345234-2434234-234',
                'iba_number' => '2345234-2434234-234',
                'branch_name' => 'Habib Bank Branch',
                'logo' => '4b30e1eb-aa82-403b-b0d3-a356f89b5e91 1.png',
            ],
        ];

        return $bankDetails[$bank] ?? null;
    }

    public function confirmPayment(Request $request)
    {
        // Get the order data from session
        $orderData = Session::get('orderData');
        if (!$orderData) {
            return redirect()->route('home'); // Redirect if no order data is found
        }

        $user_id = Auth::user()->id;

        // Validate the payment screenshot
        $request->validate([
            'payment_screenshot' => 'required|image|max:2048',
            'bank_name' => 'required|string', // Validate the bank name
        ]);

        // Get the bank name from the request
        $bankName = $request->input('bank_name');

        // Handle the payment screenshot file upload
        $paymentScreenshot = $request->file('payment_screenshot');
        $paymentScreenshotPath = $paymentScreenshot->store('uploads/payments', 'public');

        // Create the order
        $order = new Order();
        $order->user_id = $orderData['user_id'];
        $order->subtotal = $orderData['subtotal'];
        $order->discount = $orderData['discount'];
        $order->total = $orderData['total'];
        $order->name = $orderData['name'];
        $order->mobile = $orderData['mobile'];
        $order->street_address = $orderData['street_address'];
        $order->appartment_floor = $orderData['appartment_floor'];
        $order->state_city = $orderData['state_city'];
        $order->save();

        // Save order items
        foreach ($orderData['cart'] as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item['id'];
            $orderItem->order_id = $order->id;
            $orderItem->regular_price = $item['regularPrice'];
            $orderItem->sale_price = $item['salePrice'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->save();
        }

        // Create transaction for the order
        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->order_id = $order->id;
        $transaction->payment_screenshot = $paymentScreenshotPath;
        $transaction->bank_name = $bankName;
        $transaction->status = 'approved';
        $transaction->save();

        // Clear the cart session
        Session::forget('cart');
        Session::forget('orderData');

        // Redirect to the order confirmation page
        return redirect()->route('order-confirmation', ['orderId' => $order->id]);
    }



    public function orderConfirmation($orderId) 
    {
        $userId = Auth::id();

        $order = Order::with('orderItems')->where('id', $orderId)->where('user_id', $userId)->first();

        if (!$order) {
            session()->flash('error', 'Order not found or you do not have permission to view this order.');
            return redirect()->back();
        }

        $transaction = Transaction::where('order_id', $order->id)->first();

        $userId = Auth::id();
        $wishlistCount = DB::table('wishlists')->where('user_id', $userId)->count();


        return view('order-confirmation', compact('wishlistCount'),[
            'order' => $order,
            'transaction' => $transaction,
        ]);
    }
}
