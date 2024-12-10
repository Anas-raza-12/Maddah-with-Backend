@extends('layouts.main')
@section('title', 'Order Detail')
@section('bodyClass', 'orderDetail')
@section('content')
<div class="links container d-flex">
    <a class="disable" href="{{ route('home') }}">Home</a> /
    <a class="disable" href="{{ route('user.dashboard') }}">My Account</a> / <a class="Active" href="{{ route('user.dashboard') }}">Order Detail</a>
</div>
<div class="container">
    <h1>Order Details</h1>
    <div class="row">
        @include('user.include.sidebar')

        <div class="col-lg-10">
            <div class="view-btn-section container">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="table-responsive my-1">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Mobile No.</th>
                                <th>Order Date</th>
                                <th>Canceled Date</th>
                                <th>Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->mobile }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->canceled_date ?? '-' }}</td>
                                <td><span class="status {{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 class="mt-4 mb-1">Shipping Address</h3>
                <textarea class="my-1" rows="5" readonly>{{ $order->street_address }}, {{ $order->state_city }}</textarea>

                <h3>Transactions</h3>
                <div class="table-responsive">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Subtotal</th>
                                <th>Tax</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Payment Mode</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>${{ number_format($order->subtotal, 2) }}</td>
                                <td>${{ number_format($order->tax ?? 0, 2) }}</td>
                                <td>${{ number_format($order->discount, 2) }}</td>
                                <td>${{ number_format($order->total, 2) }}</td>
                                <td>
                                    @if ($order->transaction->mode == 'online_payment')
                                        Online Payment
                                    @endif
                                </td>
                                <td><span class="status {{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 class="mt-4">Items</h3>
                <div class="table-responsive mb-5">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Regular Price</th>
                                <th>Sale Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->title }}</td>
                                    <td>${{ number_format($item->regular_price, 2) }}</td>
                                    <td>${{ number_format($item->sale_price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- <form style="margin: 3vh 0vw;" action="{{ route('orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?');">
                    @csrf
                    <button type="submit" class="btn btn-danger ">Cancel Order</button>
                </form>                 --}}
            </div>
        </div>
    </div>
</div>
@endsection
