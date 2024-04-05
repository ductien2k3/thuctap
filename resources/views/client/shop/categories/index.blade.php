@extends('master')

@section('title')
    Categories
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
    <a href="{{ route('categories.create') }}" class="btn btn-success">Create</a>
</h2>
    <table class="table table-bordered table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>IMAGE</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <img src="{{ asset($item->image) }}" style="width: 50px" alt="">
                    </td>
                    <td>
                     
                        <a href="{{ route('categories.show', $item->id ?? '') }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('categories.edit', $item->id ?? '') }}" class="btn btn-warning">Update</a>
                        <form action="{{ route('categories.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-1" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
            
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection