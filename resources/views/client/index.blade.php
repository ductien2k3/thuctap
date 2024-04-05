@extends('layouts.home')

@section('content')
    <header>
        <div class="page-container">

            <nav class="navbar navbar-expand-lg navbar-custom" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="https://via.placeholder.com/100x50" alt=""></a>
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
                                        @if (Auth::user()->hasShop()) <!-- Kiểm tra xem cửa hàng đã được tạo hay chưa -->
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

            <nav class="navbar navbar-expand-lg navbar-custom" id="navbar-hidden">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="https://via.placeholder.com/100x50" alt=""></a>
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
                                        <a class="dropdown-item" href="{{ route('shop.index') }}">
                                            {{ __('Cửa hàng của tôi') }}
                                        </a>
                                    @endif

                                    @php
                                        $allowedRoles = ['Admin'];
                                    @endphp
                                    @if (in_array(Auth::user()->role, $allowedRoles))
                                        <a class="dropdown-item" href="{{ route('users.index') }}">
                                            {{ __('Quản lý user') }}
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
                                <a class="nav-link" href="#"><i class="bi bi-list-task"></i> Tất cả danh mục</a>
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

            <div class="container custom-container">
                <a class="a-link"> <i class="bi bi-skip-end-circle"></i> Tìm hiểu về Alibaba.com</a>
                <p class="p-header" id="myParagraph">Nền tảng thương mại điện tử B2B hàng đầu <br> cho giao dịch toàn
                    cầu</p>
                <div class="search-container" id="search-container">
                    <input type="text" class="search-input" maxlength="50">
                    <button class="search-button"> Tìm kiếm</button>
                    <i class="bi bi-camera camerasearch"></i>
                </div>
                <div class="regular-text-container">
                    <p class="regular-text">Tìm kiếm thường xuyên:</p>
                    <p class="regular-text searchfrequent">thong oem</p>
                    <p class="regular-text searchfrequent">đ samsung s24 ultra</p>
                    <p class="regular-text searchfrequent">chuwi ubook</p>
                </div>
            </div>
        </div>

        <div class="safe">
            <div class="container">
                <div class="card-container">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <i class="bi bi-grid"></i>
                                    <h5 class="card-title">Hàng triệu sản phẩm, dịch vụ cho doanh nghiệp</h5>
                                    <p class="card-text">Khám phá sản phẩm và nhà cung cấp cho doanh nghiệp của bạn từ
                                        hàng triệu sản phẩm, dịch vụ trên toàn thế giới.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <i class="bi bi-shield-check"></i>
                                    <h5 class="card-title">Giao dịch và chất lượng đảm bảo</h5>
                                    <p class="card-text">Đảm bảo chất lượng sản xuất từ các nhà cung cấp đã được xác
                                        minh, bảo vệ đơn hàng của bạn từ khâu thanh toán đến giao hàng.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <i class="bi bi-folder-symlink"></i>
                                    <h5 class="card-title">Giải pháp giao dịch toàn diện</h5>
                                    <p class="card-text">Đặt hàng trơn tru từ bước tìm kiếm sản phẩm/nhà cung cấp đến
                                        quản lý, thanh toán và thực hiện đơn hàng.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <i class="bi bi-boxes"></i>
                                    <h5 class="card-title">Trải nghiệm giao dịch được thiết kế riêng</h5>
                                    <p class="card-text">Nhận các quyền lợi chọn lọc, chẳng hạn như giảm giá độc quyền,
                                        bảo vệ nâng cao và hỗ trợ bổ sung, để giúp phát triển doanh nghiệp của bạn trên
                                        mọi chặng đường.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container container-introduce">
        <div class="row align-items-center">
            <div class="col-lg-6 py-4 py-lg-0 ">
                <h1 class="display-6">Khám phá hàng triệu sản phẩm, dịch vụ phù hợp với nhu cầu kinh doanh của
                    bạn</h1>
            </div>
            <div class="col-lg-6 text-lg-end">
                <div class="row">
                    <div class="col">
                        <div class="inline">

                            <p>Hơn 200</p>
                            <p>triệu</p>
                            <span>sản phẩm</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inline">
                            <p>Hơn 200</p>
                            <p>nghìn</p>
                            <span>nhà cung cấp</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="inline">
                            <p>5.900</p>
                            <span>danh mục sản phẩm</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inline">
                            <p>200+</p>
                            <span>quốc gia và khu vực</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container category-container" id="category-container">
        <div class="category-slider" id="category-slider">
            <button class="btn btn-prev" id="prev">
                < </button>
                    <ul class="category-list" id="category-list">

                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 1</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 2</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 3</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 4</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 6</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 6</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 7</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 8</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 9</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 10</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 11</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 12</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 13</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 14</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 15</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 16</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 17</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 18</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 19</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>Category 20</p>
                        </li>
                    </ul>
                    <button class="btn btn-next" id="next"> > </button>
        </div>
    </div>

    <main>
        <div class="discover">
            <div class="container container-discover">
                <h2>Khám phá cơ hội kinh doanh kế tiếp của bạn</h2>
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4 ">
                        <div class="rack-extra">
                            <p>Xếp hạng hàng đầu</p>
                            <a href="">Xem thêm</a>
                        </div>
                        <div class="card" style="width: 25rem; height: auto;">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button><button type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                        aria-label="Slide 4"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://s.alicdn.com/@img/imgextra/i2/O1CN01mIPnan1S86f7Psur2_!!6000000002201-2-tps-460-698.png_720x720.jpg"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <h5 class="card-title">Phổ biến nhất</h5>
                                        <p class="card-text">Phanh đĩa cho xe đạp đường</p>
                                        <p class="card-text-point">Điểm số mức độ phổ biến <strong> 4.4</strong> </p>
                                        <img src="https://s.alicdn.com/@sc04/kf/He8f636b6065a4378b3d9b0382c4d1bfeH.jpg"
                                            style="height: 419px; width: 419px;" class="d-block w-100 img-discover"
                                            alt="...">
                                        <div class="img-mini">
                                            <img src="https://s.alicdn.com/@sc04/kf/Hfe7a0b102c5b487a8ac4ad2a1f9ca1b6O.png"
                                                alt="" style="height: 128px; width: 128px;">
                                            <img src="https://s.alicdn.com/@sc04/kf/Ha8a4cf8433d445d49d14df1ecbfd2d51x.png"
                                                alt="" style="height: 128px; width: 128px;">
                                            <img src="https://s.alicdn.com/@sc04/kf/H5809b852fcee4c04ba8af2cb2e5ab125b.png"
                                                alt="" style="height: 128px; width: 128px;">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <h5 class="card-title">Phổ biến nhất</h5>
                                        <p class="card-text">Xe đạp đường khung thép</p>
                                        <p class="card-text-point">Điểm số mức độ phổ biến <strong> 4.4</strong> </p>
                                        <img src="https://s.alicdn.com/@sc04/kf/H786a0ef25a6d4f4bb56e9058a317fe7cG.jpg"
                                            style="height: 419px; width: 419px;" class="d-block w-100 img-discover"
                                            alt="...">
                                        <div class="img-mini">
                                            <img src="https://s.alicdn.com/@sc04/kf/H1521a85c5ab8406f80addcd90eaeeb8bF.jpg"
                                                alt="" style="height: 128px; width: 128px;">
                                            <img src="https://s.alicdn.com/@sc04/kf/Ha8a4cf8433d445d49d14df1ecbfd2d51x.png"
                                                alt="" style="height: 128px; width: 128px;">
                                            <img src="https://s.alicdn.com/@sc04/kf/H4cf450dde0624006b55b8f70b7fa287eG.jpg"
                                                alt="" style="height: 128px; width: 128px;">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <h5 class="card-title">Phổ biến nhất</h5>
                                        <p class="card-text">Xe đạp</p>
                                        <p class="card-text-point">Điểm số mức độ phổ biến <strong> 4.4</strong> </p>
                                        <img src="https://s.alicdn.com/@sc04/kf/Ha14f026dca1a44439576508d54d928afq.png"
                                            style="height: 419px; width: 419px;" class="d-block w-100 img-discover"
                                            alt="...">
                                        <div class="img-mini">
                                            <img src="https://s.alicdn.com/@sc04/kf/H1521a85c5ab8406f80addcd90eaeeb8bF.jpg"
                                                alt="" style="height: 128px; width: 128px;">
                                            <img src="https://s.alicdn.com/@sc04/kf/Ha8a4cf8433d445d49d14df1ecbfd2d51x.png"
                                                alt="" style="height: 128px; width: 128px;">
                                            <img src="https://s.alicdn.com/@sc04/kf/H4cf450dde0624006b55b8f70b7fa287eG.jpg"
                                                alt="" style="height: 128px; width: 128px;">
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-lg-4   ">
                        <div class="rack-extra">
                            <p>Hàng mới về</p>
                            <a href="">Xem thêm</a>
                        </div>

                        <div class="card " style="width: 25rem;">
                            <h5 class="card-title">79,300+ sản phẩm được thêm hôm nay</h5>
                            <div class="img-mini-4 ">
                                <img src="https://s.alicdn.com/@sc04/kf/Ha8a4cf8433d445d49d14df1ecbfd2d51x.png"
                                    alt="" width="190px" height="190px">
                                <img src="https://s.alicdn.com/@sc04/kf/H1521a85c5ab8406f80addcd90eaeeb8bF.jpg"
                                    alt="" width="190px" height="190px">
                                <img src="https://s.alicdn.com/@sc04/kf/Ha8a4cf8433d445d49d14df1ecbfd2d51x.png"
                                    alt="" width="190px" height="190px">
                                <img src="https://s.alicdn.com/@sc04/kf/Ha8a4cf8433d445d49d14df1ecbfd2d51x.png"
                                    alt="" width="190px" height="190px">
                            </div>
                            <div class="img-mini-text-img-1">
                                <img src="https://s.alicdn.com/@sc04/kf/Ha8a4cf8433d445d49d14df1ecbfd2d51x.png"
                                    alt="" width="132px" height="132px">
                                <h5 class="card-title">Mới trong tuần này</h5>
                                <p class="card-text">Chỉ sản phẩm từ Nhà cung cấp đã xác minh</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 ">
                        <div class="rack-extra">
                            <p>Tiêu điểm tiết kiệm</p>
                            <a href="">Xem thêm</a>
                        </div>
                        <div class="card " style="width: 25rem;">

                            <div class="img-mini-text-img-1 ">
                                <img src="https://s.alicdn.com/@sc04/kf/Ha8a4cf8433d445d49d14df1ecbfd2d51x.png"
                                    alt="" width="132px" height="132px">
                                <h5 class="card-title">Mới trong tuần này</h5>
                                <p class="card-text">Chỉ sản phẩm từ Nhà cung cấp đã xác minh</p>
                            </div>
                            <h5 class="card-title">Mới trong tuần này</h5>
                            <div class="img-mini-4 ">

                                <img src="https://s.alicdn.com/@sc04/kf/Ha8a4cf8433d445d49d14df1ecbfd2d51x.png"
                                    alt="" width="190px" height="190px">
                                <img src="https://s.alicdn.com/@sc04/kf/H1521a85c5ab8406f80addcd90eaeeb8bF.jpg"
                                    alt="" width="190px" height="190px">
                                <img src="https://s.alicdn.com/@sc04/kf/Ha8a4cf8433d445d49d14df1ecbfd2d51x.png"
                                    alt="" width="190px" height="190px">
                                <img src="https://s.alicdn.com/@sc04/kf/Ha8a4cf8433d445d49d14df1ecbfd2d51x.png"
                                    alt="" width="190px" height="190px">
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>


        <div class="supply">
            <div class="container container-supply">
                <h2>Tìm nguồn cung trực tiếp từ nhà máy</h2>
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4 ">
                        <div class="card-supply" style="width: 460px; height: 460px;">

                            <a href=""><img src="https://via.placeholder.com/460x460" class="card-img-top"
                                    alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title">Tham quan nhà máy trực tiếp</h5>
                                <p class="card-text"><a href="">Xem TRỰC TIẾP</a></p>
                            </div>
                        </div>
                    </div>



                    <div class="col-12 col-md-4 col-lg-4 ">
                        <div class="card-supply" style="width: 460px; height: 460px;">
                            <a href=""><img src="https://via.placeholder.com/460x460" class="card-img-top"
                                    alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title">Nhận hàng mẫu</h5>
                                <p class="card-text"><a href="">Xem Thêm</a></p>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-md-4 col-lg-4 ">
                        <div class="card-supply" style="width: 460px; height: 460px;">
                            <a href=""><img src="https://via.placeholder.com/460x460" class="card-img-top"
                                    alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title">Kết nối với các nhà sản xuất xếp hạng hàng đầu</h5>
                                <p class="card-text"><a href="">Xem Thêm</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="video-trangchu">
            <div class="container">
                <div class="col-8">
                    <h1 class="display-4 ">Tự tin giao dịch từ mặt chất lượng sản xuất cho đến bảo vệ mua hàng</h1>
                </div>

                <div class="row">

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Đảm bảo chất lượng sản xuất với</h5>
                                <img src="https://s.alicdn.com/@img/imgextra/i3/O1CN01cnsiSd1sFb5vxUBwd_!!6000000005737-2-tps-1200-210.png"
                                    alt="">
                                <p class="card-text">Kết nối với nhiều nhà cung cấp khác nhau có thông tin xác thực và
                                    năng lực đã được bên thứ ba xác minh. Hãy tìm biểu tượng "Đã xác minh" để bắt đầu
                                    tìm nguồn cung từ các nhà cung cấp có kinh nghiệm mà doanh nghiệp của bạn có thể tin
                                    cậy.</p>
                                <a href="#" class="watch-video"> <i class="bi bi-arrow-right-circle-fill"></i> Xem
                                    Video
                                </a> <a href="#">Tìm hiểu thêm</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">Bảo vệ giao dịch mua hàng của bạn với</h5>
                                <img src="https://s.alicdn.com/@img/imgextra/i1/O1CN01I0ebSF1UCntpAivUU_!!6000000002482-2-tps-1200-210.png"
                                    alt="">
                                <p class="card-text">Tự tin tìm nguồn cung với khả năng tiếp cận các tùy chọn thanh toán
                                    an toàn, bảo vệ khỏi các vấn đề về sản phẩm hoặc vận chuyển cũng như hỗ trợ hòa giải
                                    cho mọi mối lo ngại liên quan đến mua hàng khi bạn đặt hàng và thanh toán trên
                                    Alibaba.com.</p>
                                <a href="#" class="watch-video"> <i class="bi bi-arrow-right-circle-fill"></i> Xem
                                    Video
                                </a> <a href="#">Tìm hiểu thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container hienthi_container">
            <h1>Đơn giản hóa hoạt động đặt hàng từ tìm kiếm đến thực hiện đơn hàng, tất cả với một nhà cung cấp</h1>
            <div class="hienthi-all">
                <div class="slider-hienthi">
                    <div class="slide"><img
                            src="https://s.alicdn.com/@img/imgextra/i1/O1CN01KrWFW11fg52xUQzdc_!!6000000004035-0-tps-1380-1060.jpg"
                            alt="ảnh 1"></div>
                    <div class="slide"><img
                            src="https://s.alicdn.com/@img/imgextra/i2/O1CN0168f1F61TkrjFojnmE_!!6000000002421-2-tps-1380-1060.png"
                            alt="ảnh 2"></div>
                    <div class="slide"><img
                            src="https://s.alicdn.com/@img/imgextra/i1/O1CN01XW2muo1PFU87b4zQ5_!!6000000001811-2-tps-1380-1060.png"
                            alt="ảnh 3"></div>
                    <div class="slide"><img
                            src="https://s.alicdn.com/@img/imgextra/i2/O1CN01spEIDZ1TPnVsDakHo_!!6000000002375-2-tps-1380-1060.png"
                            alt="ảnh 4"></div>
                    <div class="slide"><img
                            src="https://s.alicdn.com/@img/imgextra/i1/O1CN01HrdHbz2511UJNFOxq_!!6000000007465-2-tps-1380-1060.png"
                            alt="ảnh 5"></div>
                </div>

                <div class="slider-chuyendong">
                    <div class="button-text">
                        <button onmouseover="chuyendongSlide(0)" onmouseout="dungchuyendong()"> <i
                                class="bi bi-search"></i></button>
                        <span onmouseover="chuyendongSlide(0)" onmouseout="dungchuyendong()">Tìm kiếm kết quả phù
                            hợp</span>

                    </div>
                    <div class="button-text">
                        <button onmouseover="chuyendongSlide(1)" onmouseout="dungchuyendong()"><i
                                class="bi bi-patch-check"></i></button>
                        <span onmouseover="chuyendongSlide(0)" onmouseout="dungchuyendong()">Xác định đúng</span>

                    </div>
                    <div class="button-text">
                        <button onmouseover="chuyendongSlide(2)" onmouseout="dungchuyendong()"><i
                                class="bi bi-arrow-up-circle"></i></button>
                        <span onmouseover="chuyendongSlide(0)" onmouseout="dungchuyendong()">Tự tin thanh toán</span>

                    </div>
                    <div class="button-text">
                        <button onmouseover="chuyendongSlide(3)" onmouseout="dungchuyendong()"><i
                                class="bi bi-globe"></i></button>
                        <span onmouseover="chuyendongSlide(0)" onmouseout="dungchuyendong()">Thực hiện đơn hàng
                            minh</span>

                    </div>
                    <div class="button-text">
                        <button onmouseover="chuyendongSlide(4)" onmouseout="dungchuyendong()"><i
                                class="bi bi-person-lock"></i></button>
                        <span onmouseover="chuyendongSlide(0)" onmouseout="dungchuyendong()">Quản lý dễ dàng</span>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="caunoihay">
            <div class="container">
                <h1>Nhận giảm giá, dịch vụ và công cụ phù hợp cho giai đoạn kinh doanh của bạn.</h1>
                <p>Phát triển với các quyền lợi chọn lọc do gói Thành viên Alibaba.com miễn phí cung cấp, cho dù bạn là
                    doanh nghiệp nhỏ đang cần những yếu tố cần thiết để bắt đầu tìm nguồn cung hay là doanh nghiệp có uy
                    tín đang tìm kiếm công cụ và giải pháp cho các đơn hàng phức tạp hơn.</p>
                <a href="">Tìm hiểu thêm</a>

                <div class="character-caunoi">
                </div>
            </div>
        </div>

        <div class="dangky">
            <div class="container">
                <h1>Bạn đã sẵn sàng bắt đầu?</h1>
                <p>Khám phá hàng triệu sản phẩm từ các nhà cung cấp đáng tin cậy bằng cách đăng ký ngay hôm nay!</p>
                <a href="">Đăng kí</a>
            </div>
        </div>

        <div class="container hotro-container">
            <h1 class="text-center">Hỗ trợ các doanh nghiệp thực hiện thương mại toàn cầu</h1>
            <p>Alibaba.com cung cấp giải pháp giao dịch B2B toàn diện cho các doanh nghiệp vừa và nhỏ trên toàn cầu, hỗ
                trợ họ chuyển đổi sang giao dịch kỹ thuật số, nắm bắt cơ hội và thúc đẩy tăng trưởng trên phạm vi quốc
                tế.</p>
            <div class="row">
                <div class="col">
                    <div class="card card1">
                        <div class="card-body">
                            <h5 class="card-title">SỨ MỆNH CỦA CHÚNG TÔI</h5>
                            <p class="card-text">Giúp bạn dễ dàng kinh doanh ở bất cứ đâu.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card2">
                        <div class="card-body">
                            <h5 class="card-title">ĐỊA ĐIỂM CỦA CHÚNG TÔI</h5>
                            <p class="card-text">Chúng tôi có đội ngũ trên khắp thế giới.</p>
                        </div>
                    </div>
                    <div class="card card3">
                        <div class="card-body">
                            <h5 class="card-title">CAM KẾT ESG CỦA CHÚNG TÔI</h5>
                            <p class="card-text">Công nghệ có trách nhiệm. Tương lai bền vững.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container country-container ">
            <h1>Tìm nhà cung cấp theo quốc gia hoặc khu vực</h1>
            <a href="">Xem thêm <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="container country-slider">
            <button class="btn btn-prev1">
                < </button>
                    <ul class="country-list">
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 1</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 2</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 3</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 4</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 5</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 6</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 7</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 8</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 9</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 10</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 11</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 12</p>
                        </li>
                        <li><img src="https://via.placeholder.com/50x50" alt="Category 1">
                            <p>country 13</p>
                        </li>

                    </ul>
                    <button class="btn btn-next1"> > </button>
        </div>
        <hr>
    </main>
@endsection
