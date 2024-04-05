

@extends('master')

@section('title', 'Create New Category')

@section('content')

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file" accept="image/*" required>
        </div>
        <input type="hidden" name="shop_id" value="{{ $defaultShopId }}">
        <div class="form-group mb-3 mt-3">
            <button type="submit" class="btn btn-danger">Save</button>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
        </div>
        
    </form> 
@endsection
