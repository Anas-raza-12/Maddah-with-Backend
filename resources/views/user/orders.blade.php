@extends('layouts.main') @section('title', 'My Account') @section('bodyClass', 'orders') @section('content')

<div class="links container d-flex">
    <a class="disable" href="{{ route('home') }}">Home</a> /
    <a class="disable" href="{{ route('user.dashboard') }}">My Account</a> /
    <a class="Active" href="{{ route('orders') }}">My Orders</a>
</div>

<div class="first-container container">
    <h1>My Orders</h1>
    <div class="row">
        @include('user.include.sidebar')

        <div class="col-lg-10">

            <div id="Orders-section" class="section-content">
                <div class="table-responsive my-5">
                    <table class="orders-table table">
                        <thead>
                            <tr>
                                <th class="text-center">Order No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Subtotal</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Items</th>
                                <th class="text-center">Order Date</th>
                                <th class="text-center">View More</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                                <tr>
                                    <td class="text-center">{{ $orders->firstItem() + $index }}</td>
                                    <td class="text-center">{{ $order->name }}</td>
                                    <td class="text-center">${{ number_format($order->subtotal, 2) }}</td>
                                    <td class="text-center">${{ number_format($order->total, 2) }}</td>
                                    <td class="text-center">{{ $order->items->sum('quantity') }}</td>
                                    <td class="text-center">{{ $order->created_at ? \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') : '-' }}</td>
                                    <td class="text-center"><a href="{{ route('order.detail', $order->id) }}" class="view-btn">👁</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .active-link {
        color: #8b4513;
    }
</style>


@endsection
