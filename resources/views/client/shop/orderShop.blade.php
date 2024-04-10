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

    @foreach ($orders as $order)
    <div class="card mb-3 mt-3">
        <div class="card-header bg-dark text-white">
            Mã đơn hàng: {{ $order->id }} --
            Code : {{ $order->order_code}}
        </div>
        <div class="card-body">
            <p class="mb-0">Tổng số tiền: {{ $order->total_amount }}</p>
            <p class="mb-0">Ngày đặt: {{ $order->created_at }}</p>
            <p class="mb-0">Trạng thái: {{ $order->status }}</p>
            <p class="mb-0">Địa chỉ: {{ $order->address }}</p>
            <p class="mb-0">Số điện thoại: {{ $order->phone_number }}</p>

            <!-- Thông tin người dùng -->
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Mã người dùng: {{ $order->user->id }}</p>
                    <p class="mb-0">Tên người dùng: {{ $order->name }}</p>
                    <p class="mb-0">Email người dùng: {{ $order->user->email }}</p>
                </div>
            </div>

            <!-- Các thông tin khác của đơn hàng -->
            <div class="mt-3">
                <a href="{{ route('customer.show', $order->id) }}" class="btn btn-primary">Xem chi tiết</a>
                <a href="{{ route('customer.edit', $order->id) }}" class="btn btn-success">Cập nhật đơn hàng</a>
            </div>
        </div>
    </div>
@endforeach

{{ $orders->links() }}
@endsection
