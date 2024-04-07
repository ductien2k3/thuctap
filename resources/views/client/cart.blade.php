<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Menu Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.min.css') }}">

</head>

<body>
    <!-- Start Header Area -->
    <header>
        <div class="menuhahaha">
            <nav class="navbar navbar-expand-lg navbar-custom" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="https://via.placeholder.com/100x50"
                            alt=""></a>
                    <div class="search-hidden">
                        <input type="text" class="search-input" maxlength="50">
                        <button class="search-hidden"> Tìm kiếm</button>
                        <i class="bi bi-camera camerasearch"></i>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <div class="banner">
                                    <i class="fas fa-globe"></i>
                                    <span>Giao hàng đến : <span class="country"><img
                                                src="{{ asset('assets/image/iconvn.png') }}"
                                                style="width: 25px; height: 15px;" alt=""> VN</span></span>
                                </div>

                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <div class="banner">
                                    <i class="fas fa-globe"></i>
                                    <span><i class="bi bi-globe"></i></span>
                                </div>
                            </a>
                        </li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->user_name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    @php
                                        $allowedRoles = ['Seller', 'Both', 'Admin'];
                                    @endphp
                                    @if (in_array(Auth::user()->role, $allowedRoles))
                                        @if (Auth::user()->hasShop())
                                            <!-- Kiểm tra xem cửa hàng đã được tạo hay chưa -->
                                            <a class="dropdown-item" href="{{ route('shop.index') }}">
                                                {{ __(' Cửa hàng của tôi') }}
                                            </a>
                                        @else
                                            <a class="dropdown-item" href="{{ route('shop.create') }}">
                                                {{ __('Tạo cửa hàng') }}
                                            </a>
                                        @endif
                                    @endif

                                    @php
                                        $allowedRoles = ['Admin'];
                                    @endphp
                                    @if (in_array(Auth::user()->role, $allowedRoles))
                                        <a class="dropdown-item" href="{{ route('users.index') }}">
                                            {{ __('Quản lý user') }}
                                        </a>
                                    @endif

                                    @php
                                        $allowedRoles = ['Seller', 'Buyer', 'Both', 'Admin'];
                                    @endphp
                                    @if (in_array(Auth::user()->role, $allowedRoles))
                                        <a class="dropdown-item" href="{{ route('cart.index') }}">
                                            {{ __('Giỏ hàng') }}
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            <nav class="navbar navbar-expand-md navbar-light ">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#" color=""><i class="bi bi-list-task"></i> Tất cả
                                    danh
                                    mục</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Lựa chọn nổi bật</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Trade Assurance</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Thành viên Alibaba.com</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <div class="banner">
                                        <i class="fas fa-globe"></i>
                                        <span>Trung tâm Người mua</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <div class="banner">
                                        <i class="fas fa-sign-in-alt"></i>
                                        <span>Tải ứng dụng</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <div class="banner">
                                        <i class="fas fa-user-plus"></i>
                                        <span>Trở thành nhà cung cấp</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
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
                                                // Lấy giá trị số lượng từ localStorage hoặc mặc định là giá trị trong CSDL
                                                $quantity = isset($_COOKIE['quantity_' . $item->id])
                                                    ? $_COOKIE['quantity_' . $item->id]
                                                    : $item->quantity;
                                                $totalPrice = $item->shop_product->price * $quantity;

                                                // Lấy giá trị giá tiền từ localStorage hoặc mặc định là giá trị trong CSDL
                                                $price = isset($_COOKIE['price_' . $item->id])
                                                    ? $_COOKIE['price_' . $item->id]
                                                    : $item->shop_product->price;
                                            @endphp
                                            <tr>
                                                <td class="">{{ $loop->iteration }}</td>
                                                <td class="product_remove">
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('cart.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link"><i
                                                                class="bi bi-trash"></i></button>
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
                                                    <label>Quantity</label>
                                                    <input id="quantity_{{ $item->id }}" min="1"
                                                        max="100" value="{{ $quantity }}" type="number"
                                                        onchange="updateQuantity({{ $item->id }}, {{ $item->shop_product->price }}, {{ $item->shop_product->price * $item->quantity }})">
                                                </td>
                                                <td class="product_total" id="product_total_{{ $item->id }}">
                                                    {{ $totalPrice }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <script>
                                        function updateQuantity(cartItemId, price, defaultTotalPrice) {
                                            var quantityInput = document.getElementById('quantity_' + cartItemId);
                                            var quantity = quantityInput.value;

                                            sessionStorage.setItem('quantity_' + cartItemId, quantity);
                                            sessionStorage.setItem('price_' + cartItemId, price);

                                            var currentTotal = document.getElementById('product_total_' + cartItemId).textContent;
                                            var currentTotalAsNumber = parseFloat(currentTotal);

                                            var totalPrice = price * quantity;
                                            document.getElementById('product_total_' + cartItemId).textContent = totalPrice.toFixed(2);

                                            var subtotalElement = document.getElementById('subtotal');
                                            var subtotal = parseFloat(subtotalElement.textContent);
                                            var updatedSubtotal = subtotal - currentTotalAsNumber + totalPrice;
                                            subtotalElement.textContent = updatedSubtotal.toFixed(2);

                                            // Lưu giá trị tổng số tiền vào sessionStorage
                                            sessionStorage.setItem('totalPrice', updatedSubtotal.toFixed(2));

                                            // Gửi yêu cầu AJAX tới server để cập nhật số lượng trong "Giỏ hàng"
                                            // Thay thế phần này bằng mã AJAX thực tế của bạn
                                        }

                                        window.addEventListener('load', function() {
                                            @foreach ($items as $item)
                                                var quantity = sessionStorage.getItem('quantity_{{ $item->id }}');
                                                var price = sessionStorage.getItem('price_{{ $item->id }}');
                                                if (quantity && price) {
                                                    document.getElementById('quantity_{{ $item->id }}').value = quantity;
                                                    document.getElementById('product_total_{{ $item->id }}').textContent = (price * quantity)
                                                        .toFixed(2);
                                                }
                                            @endforeach

                                            // Khôi phục giá trị tổng số tiền từ sessionStorage sau khi tải lại trang
                                            var totalPrice = sessionStorage.getItem('totalPrice');
                                            if (totalPrice) {
                                                document.getElementById('subtotal').textContent = totalPrice;
                                            }
                                        });
                                    </script>


                                </table>
                            </div>

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
                                    <a href="{{ route('orders.index') }}" class="btn btn-md btn-golden">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->
    <footer>
        <div class="footer3">
            <div class="container ">
                <p><a href="">AliExpress</a> | <a href="">1688.com</a> | <a href="">Tmall Taobao
                        World</a> | <a href="">Alipay</a> | <a href="">Lazada</a> |<a
                        href="">Taobao Global</a> </p>
                <p><a href="">Chính sách và quy tắc</a> - <a href="">Thông báo pháp lý
                    </a> - <a href="">Chính sách về danh sách sản phẩm</a> - <a href="">Bảo vệ tài sản
                        trí tuệ
                    </a> - <a href="">Chính sách Quyền riêng tư
                    </a> -<a href="">Điều khoản Sử dụng</a> - <a href="">Tuân thủ tính chính trực</a>
                </p>
                <p>© 1999-2024 hahahahahah.com. Đã bảo lưu mọi quyền.
                    浙公网安备 33010002000092号
                    浙B2-20120091-4</p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>
</body>

</html>
