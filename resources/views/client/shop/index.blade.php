@extends('master')

@section('title')
    Cửa hàng của tôi
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
                    </li <li class="nav-item">

                    <a class="nav-link" href="{{ route('shop.edit', $shop->id) }}">Cập nhật cửa hàng</a>

                    </li>
                @endif
            </ul>
        </div>
    </nav>
    @if (Auth::user()->hasShop())
        <div class="form-group mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $shop->name ?? '' }}"
                required disabled>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $shop->address ?? '' }}"
                required disabled>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="image">Image:</label>
            <img src="{{ asset($shop->image) }}" style="width: 50px" alt="">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control"
                value="{{ $shop->phone_number ?? '' }}" required disabled>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required disabled>{{ $shop->description ?? '' }}</textarea>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $shop->email ?? '' }}"
                required disabled>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="created_by">Created by:</label>
            <input type="text" name="created_by" id="created_by" class="form-control" disabled
                value="{{ Auth::user()->user_name }}"disabled>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    @endif
@endsection
