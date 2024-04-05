

@extends('master')

@section('title', 'Update Category' . ' : ' . $shop_category->name) 

@section('content')
    <form action="{{ route('categories.update', $shop_category->id ?? '') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method ('PUT')
        <div class="form-group mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required value=" {{ $shop_category->name }} ">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file" accept="image/*" >
            <img src="{{ asset($shop_category->image) }}" alt="" width="50px">
        </div>
        <div class="form-group mb-3 mt-3">
            <button type="submit" class="btn btn-danger">Save</button>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
        </div>
        
    </form>

    
@endsection
