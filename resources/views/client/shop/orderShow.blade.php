@extends('master')

@section('title')
    Đơn hàng của tôi
@endsection

@section('content')
    @if (Auth::user()->hasShop())
        {{-- Đã tạo cửa hàng, ẩn nút --}}
    @else
        {{-- Chưa tạo cửa hàng, hiển thị nút --}}
        <a href="{{ route('shop.create') }}" class="btn btn-primary">Tạo Cửa Hàng</a>
    @endif

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home.index') }}">Trang chủ</a>
                </li>

                @if (Auth::user()->hasShop())
                    {{-- Đã tạo cửa hàng, ẩn nút --}}<li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Danh mục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('myshop.products.index') }}">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('shop.edit', $shop->id) }}">Cập nhật cửa hàng</a> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.index') }}">Đơn Hàng</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Chi tiết đơn hàng #{{ $order->id }}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Tổng số tiền:</strong> {{ $order->total_amount }}</p>
                        <p><strong>Ngày đặt:</strong> {{ $order->created_at }}</p>
                        <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
                        <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                        <p><strong>Số điện thoại:</strong> {{ $order->phone_number }}</p>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Thông tin người dùng</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Mã người dùng:</strong> {{ $order->user->id }}</p>
                                <p><strong>Tên người dùng:</strong> {{ $order->name }}</p>
                                <p><strong>Email người dùng:</strong> {{ $order->user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h2 class="text-center">Danh sách sản phẩm:</h2>
                @foreach ($order->shop_products as $product)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Tên sản phẩm: {{ $product->name }}</h5>
                            <p class="card-text"><strong>Giá:</strong> {{ $product->price }}</p>
                            <p class="card-text"><strong>Số lượng:</strong> {{ $product->pivot->quantity }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    
    @endsection
