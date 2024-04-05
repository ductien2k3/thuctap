

@extends('master')

@section('title', 'Create New Shop')

@section('content')
    <form action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file" accept="image/*" required>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" required>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="email">Được tạo bởi:</label>
            <input type="text" name="" id="" class="form-control" disabled value="{{ Auth::user()->user_name}}">
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="form-group mb-3 mt-3">
            <button type="submit" class="btn btn-danger">Save</button>
            <a href="{{ route('shop.index') }}" class="btn btn-primary">Back</a>
        </div>      
    </form> 
@endsection
