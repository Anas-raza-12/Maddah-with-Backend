@extends('layouts.main')
@section('title', 'Order-detail')
@section('bodyClass', 'orderDetail')

@section('content')
<div class="view-btn-section container">
                <h3>Ordered Details</h3>

                <div data-aos="zoom-in" data-aos-duration="1000" class="table-responsive my-1">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Mobile</th>
                                <th>Pin/Zip Code</th>
                                <th>Order Date</th>
                                <th>Delivered Date</th>
                                <th>Cancelled Date</th>
                                <th>Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10001</td>
                                <td>1234567891</td>
                                <td>804401</td>
                                <td>2024-07-11 00:54:14</td>
                                <td>2024-07-07</td>
                                <td>2024-07-07</td>
                                <td><span class="status canceled">Canceled</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>Shipping Address</h3>
                <textarea data-aos="zoom-in" data-aos-duration="1000" name="" id="" placeholder="Enter your Address" rows="5"></textarea>

                <h3>Transactions</h3>
                <div data-aos="zoom-in" data-aos-duration="1000" class="table-responsive">
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
                                <td>$172.00</td>
                                <td>$36.12</td>
                                <td>$0.00</td>
                                <td>$208.12</td>
                                <td>COD</td>
                                <td><span class="status ordered">Appreved</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button>Cancel
                </button>
            </div>
@endsection
