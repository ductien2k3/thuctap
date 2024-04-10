<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Menu Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.min.css') }}">
 <script>
    
 </script>
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
                                        <a class="dropdown-item" href="{{ route('myorders.index') }}">
                                            {{ __('Đơn hàng của tôi') }}
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

    <main>
        <div id="content">
            @yield('content')
        </div>
    </main>

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