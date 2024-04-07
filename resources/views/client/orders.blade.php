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
                                        <input type="text" name="first_name" value="{{ Auth::user()->first_name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Last Name <span>*</span></label>
                                        <input type="text" name="last_name" value="{{ Auth::user()->last_name }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Area</label>
                                        <input type="text" value="{{ Auth::user()->area }}"  value="{{ Auth::user()->area }}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Street address <span>*</span></label>
                                        <input placeholder="House number and street name" type="text" name="address" 
                                            value="{{ Auth::user()->address }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Phone <span>*</span></label>
                                        <input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Email Address <span>*</span></label>
                                        <input type="text" name="email" value="{{ Auth::user()->email }}">
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
