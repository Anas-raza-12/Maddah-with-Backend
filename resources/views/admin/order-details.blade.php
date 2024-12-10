@extends('layouts.dash-main')
@section('content')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        
        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Order Overview</h5>
            </div>
            <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                    <a href="#!" class="text-slate-400 dark:text-zink-200">Ecommerce</a>
                </li>
                <li class="text-slate-700 dark:text-zink-100">
                    Order Overview
                </li>
            </ul>
        </div>
        {{-- <div class="grid grid-cols-1 2xl:grid-cols-12 gap-x-5">
            <div class="2xl:col-span-3">
                <div class="card">
                    <div class="card-body">
                        <div class="flex items-center justify-center bg-purple-100 rounded-md size-12 dark:bg-purple-500/20 ltr:float-right rtl:float-left">
                            <i data-lucide="truck" class="text-purple-500 fill-purple-200 dark:fill-purple-500/30"></i>
                        </div>
                        <h6 class="mb-4 text-15">Shipping Details</h6>

                        <h6 class="mb-1">Pauline Hylton</h6>
                        <p class="mb-1 text-slate-500 dark:text-zink-200">1235 Crossing Meadows Dr, Onalaska</p>
                        <p class="text-slate-500 dark:text-zink-200">West Virginia, USA</p>
                    </div>
                </div>
            </div><!--end col-->
            <div class="2xl:col-span-3">
                <div class="card">
                    <div class="card-body">
                        <div class="flex items-center justify-center bg-orange-100 rounded-md size-12 dark:bg-orange-500/20 ltr:float-right rtl:float-left">
                            <i data-lucide="credit-card" class="text-orange-500 fill-orange-200 dark:fill-orange-500/30"></i>
                        </div>
                        <h6 class="mb-4 text-15">Billing Details</h6>

                        <h6 class="mb-1">Pauline Hylton</h6>
                        <p class="mb-1 text-slate-500 dark:text-zink-200">1235 Crossing Meadows Dr, Onalaska</p>
                        <p class="text-slate-500 dark:text-zink-200">West Virginia, USA</p>
                    </div>
                </div>
            </div><!--end col-->
            <div class="2xl:col-span-3">
                <div class="card">
                    <div class="card-body">
                        <div class="flex items-center justify-center rounded-md size-12 ltr:float-right rtl:float-left bg-sky-100 dark:bg-sky-500/20">
                            <i data-lucide="circle-dollar-sign" class="text-sky-500 fill-sky-200 dark:fill-sky-500/30"></i>
                        </div>
                        <h6 class="mb-4 text-15">Payment Details</h6>

                        <h6 class="mb-1">ID: #TSD456DF41SD5</h6>
                        <p class="mb-1 text-slate-500 dark:text-zink-200">Payment Method: <b>Credit Card</b></p>
                        <p class="mb-1 text-slate-500 dark:text-zink-200">Card Number: <b>xxxx xxxx xxxx 1501</b></p>
                    </div>
                </div>
            </div><!--end col-->
            <div class="2xl:col-span-3">
                <div class="card">
                    <div class="card-body">
                        <div class="bg-yellow-100 rounded-md size-12 ltr:float-right rtl:float-left dark:bg-yellow-500/20">
                            <img src="assets/images/avatar-4.png" alt="" class="h-12 rounded-md">
                        </div>
                        <h6 class="mb-4 text-15">Customer Info</h6>

                        <h6 class="mb-1">Pauline Hylton</h6>
                        <p class="mb-1 text-slate-500 dark:text-zink-200">pauline@tailwick.com</p>
                        <p class="text-slate-500 dark:text-zink-200">+(78) 120 4843 4714</p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end grid--> --}}

        <div class="grid grid-cols-1 2xl:grid-cols-12 gap-x-5">
            <div class="2xl:col-span-9">
                <div class="grid grid-cols-1 2xl:grid-cols-5 gap-x-5">
                    <div>
                        <div class="card">
                            <div class="text-center card-body">
                                <h6 class="mb-1 underline">#{{ $order->id }}</h6>
                                <p class="uppercase text-slate-500 dark:text-zink-200">Order ID</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div>
                        <div class="card">
                            <div class="text-center card-body">
                                <h6 class="mb-1">{{ $order->created_at }}</h6>
                                <p class="uppercase text-slate-500 dark:text-zink-200">Order Date</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div>
                        <div class="card">
                            <div class="text-center card-body">
                                <h6 class="mb-1">{{ $order->delieverd_date == '' ? '-' : $order->delieverd_date }}</h6>
                                <p class="uppercase text-slate-500 dark:text-zink-200">Delivery Date</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div>
                        <div class="card">
                            <div class="text-center card-body">
                                <h6 class="mb-1">${{ $order->total }}</h6>
                                <p class="uppercase text-slate-500 dark:text-zink-200">Order Amount</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div>
                        <div class="card">
                            <div class="text-center card-body">
                                <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-purple-100 border-purple-200 text-purple-500 dark:bg-purple-500/20 dark:border-purple-500/20">Ordered</span>
                                <p class="uppercase text-slate-500 dark:text-zink-200">Order Status</p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end grid-->
                <div class="card">
                    <div class="card-body">
                        <div class="flex items-center gap-3 mb-4">
                            <h6 class="text-15 grow">Order Summary</h6>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <tbody>
                                    @foreach ($order->items as $item)
                                    <tr>
                                        <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                            <div class="flex items-center gap-3">
                                                <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                    <!-- Display product image dynamically -->
                                                    <img src="{{ asset('uploads/products/' . $item->product->featured_image) }}" alt="{{ $item->product->name }}" class="h-8">
                                                </div>
                                                <div class="grow">
                                                    <!-- Product name and quantity -->
                                                    <h6 class="mb-1 text-15">
                                                        <a href="" class="transition-all duration-300 ease-linear hover:text-custom-500">
                                                            {{ $item->product->name }}
                                                        </a>
                                                    </h6>
                                                    <!-- Display price and quantity dynamically -->
                                                    <p class="text-slate-500 dark:text-zink-200">
                                                        ${{ number_format($item->product->regular_price) }} x {{ $item->quantity }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">
                                            <!-- Display total for this item -->
                                            ${{ number_format(($item->product->regular_price) * $item->quantity, 2) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @php
                                        $subtotal = 0;
                                        $totalDiscount = 0;

                                        // Loop through items to calculate subtotal and total discount
                                        foreach ($order->items as $item) {
                                            $regularPrice = $item->product->regular_price;
                                            $salePrice = $item->product->sale_price !== '' && $item->product->sale_price !== null ? $item->product->sale_price : $regularPrice;

                                            // Calculate the subtotal (sum of regular prices * quantity)
                                            $subtotal += $regularPrice * $item->quantity;

                                            // Calculate the discount for the item (regular price - sale price)
                                            $discountPerItem = ($regularPrice - $salePrice) * $item->quantity;
                                            $totalDiscount += $discountPerItem;
                                        }

                                        // Calculate the total amount after discount
                                        $totalAfterDiscount = $subtotal - $totalDiscount;
                                    @endphp

                                    <tr>
                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                            Subtotal
                                        </td>
                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                                            ${{ number_format($subtotal, 2) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                            Item Discounts ({{ number_format(($totalDiscount / $subtotal) * 100, 2) }}%)
                                        </td>
                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                                            -${{ number_format($totalDiscount, 2) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                            Shipping Charge
                                        </td>
                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                                            $0
                                        </td>
                                    </tr>

                                    <tr class="font-semibold">
                                        <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                            Total Amount (USD)
                                        </td>
                                        <td class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                                            ${{ number_format($totalAfterDiscount, 2) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end card-->
            </div><!--end col-->
            <div class="2xl:col-span-3">
                <div class="card">
                    <div class="card-body">
                        <div class="bg-yellow-100 rounded-md size-12 ltr:float-right rtl:float-left dark:bg-yellow-500/20">
                            <img src="assets/images/avatar-4.png" alt="" class="h-12 rounded-md">
                        </div>
                        <h6 class="mb-4 text-15">Customer Info</h6>
            
                        <!-- User's Name -->
                        <h6 class="mb-1">{{ $order->name }}</h6>
            
                        <!-- User's Email -->
                        <p class="mb-1 text-slate-500 dark:text-zink-200">{{ $order->user->email }}</p>
            
                        <!-- User's Mobile -->
                        <p class="text-slate-500 dark:text-zink-200">{{ $order->mobile }}</p>
            
                        <!-- User's Address -->
                        <p class="text-slate-500 dark:text-zink-200">
                            {{ $order->street_address }},
                            {{ $order->appartment_floor }},
                            {{ $order->state_city }}
                        </p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end grid-->

    </div>
    <!-- container-fluid -->
</div>
@endsection