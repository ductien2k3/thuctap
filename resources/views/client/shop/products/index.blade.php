@extends('master')

@section('title')
    Products
@endsection

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('shop.index') }}">Trang chủ</a>
            </li>

            @if (Auth::user()->hasShop())
                {{-- Đã tạo cửa hàng, ẩn nút --}}<li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('myshop.products.index') }}">Sản phẩm</a>
                
            @endif
        </ul>
    </div>
</nav>
    <h2>
        <a href="{{ route('myshop.products.create') }}" class="btn btn-success">Create</a>
    </h2>
    <table class="table table-bordered table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>CATEGORY</th>
                <th>Name</th>
                <th>SKU</th>
                <th>IMAGE</th>
                <th>PRICE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->shop_category->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->sku }}</td>
                    <td>
                        <img src="{{ asset($item->image) }}" style="width: 50px" alt="">
                    </td>

                    <td>{{ $item->price }}</td>
                    <td>
                        <div class="from-group mt-1 mb-1">
                        <a href="{{ route('myshop.products.show', $item->id ?? '') }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('myshop.products.edit', $item->id ?? '') }}" class="btn btn-warning">Update</a>

                        <form action="{{ route('myshop.products.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
