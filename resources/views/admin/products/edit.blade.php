
@extends('master')

@section('title', 'Update Product' ." : " . $product->name)

@section('content')
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group mb-3 mt-3">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach ($categories as $id => $name)
                    <option @if ($product->category_id == $id) selected @endif value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required value=" {{ $product->name }} ">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="sku">SKU:</label>
            <input type="text" name="sku" id="sku" class="form-control" required value=" {{ $product->sku }} ">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file" accept="image/*" >
            <img src="{{ asset( $product->image )}}" width="100"  class="mt-3"  alt="">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="overview">Overview:</label>
            <textarea name="overview" id="overview" class="form-control" rows="4" required >{{ $product->overview }}</textarea >
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="6" required>{{ $product->description }}</textarea>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" class="form-control" min="0" step="0.01" required value ="{{ $product->price }}">
        </div>
        <div class="form-group mb-3 mt-3">
            <button type="submit" class="btn btn-danger">Save</button>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection
