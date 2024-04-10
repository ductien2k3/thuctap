@extends('layouts.layoutchung')


@section('content')
    <!-- ...:::: Start Cart Section:::... -->
    <div class="checkout-section">
        <div class="container">

            <!-- Start User Details Checkout Form -->
            <form action="{{ route('orders.store') }}" method="POST">
                <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">

                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>First Name <span>*</span></label>
                                        <input type="text" name="first_name" value="{{ Auth::user()->first_name }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Last Name <span>*</span></label>
                                        <input type="text" name="last_name" value="{{ Auth::user()->last_name }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Area</label>
                                        <input type="text" value="{{ Auth::user()->area }}"  value="{{ Auth::user()->area }}" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Street address <span>*</span></label>
                                        <input placeholder="House number and street name" type="text" name="address" 
                                            value="{{ Auth::user()->address }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Phone <span>*</span></label>
                                        <input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Email Address <span>*</span></label>
                                        <input type="text" name="email" value="{{ Auth::user()->email }}" required>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="order-notes">
                                        <label for="order_note">Order Notes</label>
                                        <textarea id="order_note" name="textnote" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6">

                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $cartItem)
                                            <tr>
                                                <td>{{ $cartItem->shop_product->name }} <strong> ×
                                                        {{ $cartItem->quantity }}</strong></td>
                                                <td> {{ $cartItem->shop_product->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td>${{ $total }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong>{{ $ship }}</strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong><input type="text" name="total_amount" value="{{ $total_amount }}" readonly ></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method">
                                <div class="panel-default">
                                    <label class="checkbox-default" for="currencyCod" data-bs-toggle="collapse" data-bs-target="#methodCod">
                                        <input type="checkbox" name="payment" value="currencyCod" id="currencyCod">
                                        <span>Cash on Delivery</span>
                                    </label>
                                    <div id="methodCod" class="collapse" data-parent="#methodCod">
                                        <div class="card-body1">
                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-default">
                                    <label class="checkbox-default" for="currencyPaypal" data-bs-toggle="collapse" data-bs-target="#methodPaypal">
                                        <input type="checkbox" name="payment" value="PayPal" id="currencyPaypal">
                                        <span>PayPal</span>
                                    </label>
                                    <div id="methodPaypal" class="collapse" data-parent="#methodPaypal">
                                        <div class="card-body1">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                        </div>
                                    </div>
                                </div>
                          
                                <div class="order_button pt-3">
                                    @csrf
                                    <button class="btn btn-md btn-black-default-hover" type="submit">Thanh
                                        Toán</button>
                                </div>
                            </div>
            </form>
        </div>
    </div>
    </div> <!-- Start User Details Checkout Form -->
    </div>
    </div> <!-- ...:::: End Cart Section:::... -->
    @endsection