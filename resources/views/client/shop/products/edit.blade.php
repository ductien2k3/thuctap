
@extends('master')

@section('title', 'Update Product' ." : " . $shop_product->name)

@section('content')
    <form action="{{ route('myshop.products.update', $shop_product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group mb-3 mt-3">
            <label for="category_id">Category:</label>
            <select name="shop_category_id" id="shop_category_id" class="form-control" required>
                @foreach ($shop_category as $id => $name)
                    <option @if ($shop_product->shop_category_id == $id) selected @endif value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required value=" {{ $shop_product->name }} ">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="sku">SKU:</label>
            <input type="text" name="sku" id="sku" class="form-control" required value=" {{ $shop_product->sku }} ">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file" accept="image/*" >
            <img src="{{ asset( $shop_product->image )}}" width="100"  class="mt-3"  alt="">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="overview">Overview:</label>
            <textarea name="overview" id="overview" class="form-control" rows="4" required >{{ $shop_product->overview }}</textarea >
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="6" required>{{ $shop_product->description }}</textarea>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" class="form-control" min="0" step="0.01" required value ="{{ $shop_product->price }}">
        </div>
        <div class="form-group mb-3 mt-3">
            <button type="submit" class="btn btn-danger">Save</button>
            <a href="{{ route('myshop.products.index') }}" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection
