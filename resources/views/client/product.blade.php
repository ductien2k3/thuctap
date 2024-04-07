<!DOCTYPE html>
<html>

<head>
    <title>Menu Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.min.css') }}">
</head>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<body>
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
                                
                                    @php
                                        $allowedRoles = ['Seller','Buyer','Both', 'Admin'];
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

    <main>
        <div class="shop-section">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-lg-3">
                        <!-- Start Sidebar Area -->
                        <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">CATEGORIES</h6>
                                <div class="sidebar-content">
                                    <ul class="sidebar-menu">


                                        </li>
                                        @foreach ($dataCategory as $category)
                                            <li><a href="#">{{ $category->name }}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div> <!-- End Single Sidebar Widget -->

                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">FILTER BY PRICE</h6>
                                <div class="sidebar-content">
                                    <div id="slider-range"></div>
                                    <div class="filter-type-price">
                                        <label for="amount">Price range:</label>
                                        <input type="text" id="amount">
                                    </div>
                                </div>
                            </div> <!-- End Single Sidebar Widget -->
                        </div> <!-- End Sidebar Area -->
                    </div>
                    <div class="col-lg-9">
                        <!-- Start Shop Product Sorting Section -->
                        <div class="shop-sort-section">
                            <div class="container">
                                <div class="row">
                                    <!-- Start Sort Wrapper Box -->
                                    <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column"
                                        data-aos="fade-up" data-aos-delay="0">
                                        <!-- Start Sort tab Button -->
                                        <div class="sort-tablist d-flex align-items-center">
                                            <ul class="tablist nav sort-tab-btn">
                                                <li><a class="nav-link" data-bs-toggle="tab"
                                                        href="#layout-3-grid"><img
                                                            src="{{ asset('assets/assets/images/icons/bkg_grid.png ') }}"
                                                            alt=""></a>
                                                </li>
                                                <li><a class="nav-link active" data-bs-toggle="tab"
                                                        href="#layout-list"><img
                                                            src="{{ asset('assets/assets/images/icons/bkg_list.png ') }}"
                                                            alt=""></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Sort tab Button -->

                                        <!-- Start Sort Select Option -->
                                        <div class="sort-select-list d-flex align-items-center">
                                            <label class="mr-2">Sort By:</label>
                                            <form action="#">
                                                <fieldset>
                                                    <select name="speed" id="speed">
                                                        <option>Sort by average rating</option>
                                                        <option>Sort by popularity</option>
                                                        <option selected="selected">Sort by newness</option>
                                                        <option>Sort by price: low to high</option>
                                                        <option>Sort by price: high to low</option>
                                                        <option>Product Name: Z</option>
                                                    </select>
                                                </fieldset>
                                            </form>
                                        </div> <!-- End Sort Select Option -->
                                    </div> <!-- Start Sort Wrapper Box -->
                                </div>
                            </div>
                        </div> <!-- End Section Content -->

                        <!-- Start Tab Wrapper -->
                        <div class="sort-product-tab-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="tab-content tab-animate-zoom">
                                            <!-- Start Grid View Product -->
                                            <div class="tab-pane sort-layout-single" id="layout-3-grid">
                                                <div class="row">
                                                    @foreach ($dataProduct as $product)
                                                    <div class="col-xl-4 col-sm-6 col-12">
                                                        <!-- Start Product Default Single Item -->
                                                        <div class="product-default-single-item product-color--golden">
                                                            <div class="image-box">
                                                                <a href="product-details-default.html" class="image-link">
                                                                    <img src="{{ asset($product->image) }}" style="width: 320px ; height: 250px" alt="">
                                                                    <img src="{{ asset($product->image) }}" style="width: 320px ; height: 250px" alt="">
                                                                </a>
                                                                <div class="action-link">
                                                                    <div class="action-link-left">
                                                                        <!-- Sửa phần form để thêm vào giỏ hàng -->
                                                                        <form action="{{ route('cart.add') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                            <input type="hidden" name="quantity" value="1" min="1">
                                                                            <button class="btn btn-md btn-golden" type="submit">Add to Cart</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="action-link-right">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="bi bi-search"></i></a>
                                                                        <a href="wishlist.html"><i class="bi bi-heart"></i></a>
                                                                        <a href="compare.html"><i class="bi bi-cart"></i></a>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="content-left">
                                                                    <h6 class="title"><a href="#">{{ $product->name }}</a></h6>
                                                                </div>
                                                                <div class="content-right">
                                                                    <span class="price">{{ $product->price }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Product Default Single Item -->
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>  <!-- End Grid View Product -->
                                            <!-- Start List View Product -->
                                            <div class="tab-pane active show sort-layout-single" id="layout-list">
                                                <div class="row">
                                                    @foreach ($dataProduct as $product)
                                                        <div class="col-12">
                                                            <!-- Start Product Defautlt Single -->

                                                            <div class="product-list-single product-color--golden"
                                                                data-aos="fade-up" data-aos-delay="0">
                                                                <a href="product-details-default.html"
                                                                    class="product-list-img-link">
                                                                    <img src="{{ asset($product->image) }}"
                                                                        style="width: 320px ; height: 250px"
                                                                        alt="">
                                                                    <img src="{{ asset($product->image) }}"
                                                                        style="width: 320px ; height: 250px"
                                                                        alt="">
                                                                </a>
                                                                <div class="product-list-content">
                                                                    <h5 class="product-list-link"><a
                                                                            href="#">{{ $product->name }}</a>
                                                                    </h5>

                                                                    <span
                                                                        class="product-list-price"><del>{{ $product->price }}</del>
                                                                        {{ $product->price }}</span>
                                                                    <p>{{ $product->overview }}</p>
                                                                    <div class="product-action-icon-link-list">
                                                                        <form action="{{ route('cart.add') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                            <input type="hidden" name="quantity" value="1" min="1">
                                                                            <button class="btn btn-lg btn-black-default-hover" type="submit">Add to Cart</button>
                                                                        </form>
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modalQuickview"
                                                                            class="btn btn-lg btn-black-default-hover"><i
                                                                                class="bi bi-search"></i></a>
                                                                        <a href="wishlist.html"
                                                                            class="btn btn-lg btn-black-default-hover"><i
                                                                                class="bi bi-heart"></i></a>
                                                                        <a href="compare.html"
                                                                            class="btn btn-lg btn-black-default-hover"><i
                                                                                class="bi bi-cart"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- End Product Defautlt Single -->
                                                        </div>
                                                    @endforeach



                                                </div>
                                            </div> <!-- End List View Product -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Tab Wrapper -->

                        <!-- Start Pagination -->
                        <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                            {{ $dataProduct->links() }}
                        </div> <!-- End Pagination -->
                    </div> <!-- End Shop Product Sorting Section  -->
                </div>
            </div>
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
