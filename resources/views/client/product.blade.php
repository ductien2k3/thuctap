@extends('layouts.layoutchung')


@section('content')
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
                                                <li><a class="nav-link" data-bs-toggle="tab" href="#layout-3-grid"><img
                                                            src="{{ asset('assets/assets/images/icons/bkg_grid.png ') }}"
                                                            alt=""></a>
                                                </li>
                                                <li><a class="nav-link active" data-bs-toggle="tab" href="#layout-list"><img
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
                                                                    <a href="product-details-default.html"
                                                                        class="image-link">
                                                                        <img src="{{ asset($product->image) }}"
                                                                            style="width: 320px ; height: 250px"
                                                                            alt="">
                                                                        <img src="{{ asset($product->image) }}"
                                                                            style="width: 320px ; height: 250px"
                                                                            alt="">
                                                                    </a>
                                                                    <div class="action-link">
                                                                        <div class="action-link-left">
                                                                            <!-- Sửa phần form để thêm vào giỏ hàng -->
                                                                            <form action="{{ route('cart.add') }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="product_id"
                                                                                    value="{{ $product->id }}">
                                                                                <input type="hidden" name="quantity"
                                                                                    value="1" min="1">
                                                                                <button class="btn btn-md btn-golden"
                                                                                    type="submit">Add to Cart</button>
                                                                            </form>
                                                                        </div>
                                                                        <div class="action-link-right">
                                                                            <a href="#" data-bs-toggle="modal"
                                                                                data-bs-target="#modalQuickview"><i
                                                                                    class="bi bi-search"></i></a>
                                                                            <a href="wishlist.html"><i
                                                                                    class="bi bi-heart"></i></a>
                                                                            <a href="compare.html"><i
                                                                                    class="bi bi-cart"></i></a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="content">
                                                                    <div class="content-left">
                                                                        <h6 class="title"><a
                                                                                href="#">{{ $product->name }}</a></h6>
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
                                            </div> <!-- End Grid View Product -->
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
                                                                        <form action="{{ route('cart.add') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="product_id"
                                                                                value="{{ $product->id }}">
                                                                            <input type="hidden" name="quantity"
                                                                                value="1" min="1">
                                                                            <button
                                                                                class="btn btn-lg btn-black-default-hover"
                                                                                type="submit">Add to Cart</button>
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
@endsection
