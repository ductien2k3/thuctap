
@extends('master')

@section('title', 'Create New Product')

@section('content')
    <form action="{{ route('myshop.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3 mt-3">
            <label for="category_id">Category:</label>
            <select name="shop_category_id" id="category_id" class="form-control" required>
                    <option value="">Vui lòng chọn danh mục</option>
                @foreach ($shop_category as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="sku">SKU:</label>
            <input type="text" name="sku" id="sku" class="form-control" required>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file" accept="image/*" required>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="overview">Overview:</label>
            <textarea name="overview" id="overview" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="6" required></textarea>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" class="form-control" min="0" step="0.01" required>
        </div>
        <div class="form-group mb-3 mt-3">
            <button type="submit" class="btn btn-danger">Save</button>
            <a href="{{ route('myshop.products.index') }}" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection
