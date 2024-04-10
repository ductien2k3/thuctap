@extends('layouts.layoutchung')

@section('content')
    <!-- ...:::: Start Cart Section:::... -->
    <div class="cart-section">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">STT</th>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        <!-- Start Cart Single Item-->
                                        @foreach ($items as $item)
                                            @php
                                                // Lấy giá trị số lượng từ session hoặc mặc định là giá trị trong CSDL
                                                $quantity = session('quantity_' . $item->id, $item->quantity);
                                                $totalPrice = $item->shop_product->price * $quantity;

                                                // Lấy giá trị giá tiền từ session hoặc mặc định là giá trị trong CSDL
                                                $price = session('price_' . $item->id, $item->shop_product->price);
                                            @endphp
                                            <tr>
                                                <td class="">{{ $loop->iteration }}</td>
                                                <td class="product_remove">
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link"><i class="bi bi-trash"
                                                                onclick="return confirm('Are you sure you want to delete this item from your cart?')"></i></button>
                                                    </form>
                                                </td>

                                                <td class="product_thumb"><a href="product-details-default.html"><img
                                                            src="{{ asset($item->shop_product->image) }}"
                                                            alt=""></a></td>
                                                <td class="product_name"><a
                                                        href="product-details-default.html">{{ $item->shop_product->name }}</a>
                                                </td>
                                                <td class="product-price">{{ $price }}</td>
                                                <td class="product_quantity">
                                        
                                                    {{-- <input name="quantity[]" id="quantity_{{ $item->id }}"
                                                        min="1" max="100" value="{{ $quantity }}"
                                                        type="number"> --}}
                                                    <input type="number" name="quantity" data-rowid="{{ $item->id }}"
                                                        onchange="updateQuantity(this)" 
                                                        value="{{ $quantity }}">
                                                </td>
                                                <td class="product_total" id="product_total_{{ $item->id }}">
                                                    {{ $totalPrice }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <form id="updateCartQty" action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <input type="hidden" id="id" name="id" />
                                <input type="hidden" id="quantity" name="quantity" />
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->
        <!-- Start Coupon Start -->
        <div class="coupon_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left" data-aos="fade-up" data-aos-delay="200">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">
                                <p>Enter your coupon code if you have one.</p>
                                <input class="mb-2" placeholder="Coupon code" type="text">
                                <button type="submit" class="btn btn-md btn-golden">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount" id="subtotal">{{ $total }}</p>
                                </div>

                                <div class="checkout_btn">
                                    <a href="{{ route('orders.index') }}" class="btn btn-md btn-golden">Mua
                                        Hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->

    <script>
        function updateQuantity(qty) {
    document.getElementById('id').value = qty.getAttribute('data-rowid');
    document.getElementById('quantity').value = qty.value;
    document.getElementById('updateCartQty').submit();
}

    </script>
@endsection
