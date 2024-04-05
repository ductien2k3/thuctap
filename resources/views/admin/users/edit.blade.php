@extends('master')

@section('title', 'Update User' . ' : ' . $user->user_name)

@section('content')
    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3 mt-3">
            <label for="country">Country:</label>
            <select name="country" id="country" class="form-control" required>
                <option value="{{ $user->country }}"> {{ $user->country }}</option>
               
                <option value="Việt Nam">Việt Nam</option>
                <option value="Trung Quốc">Trung Quốc</option>
                <option value="Mỹ">Mỹ</option>
            </select>
        </div>

        <div class="form-group mb-3 mt-3">
            <label for="name">Role:</label>
            <select name="role" id="role" class="form-control" required>
                <option value="{{ $user->role }}"> {{ $user->role }}</option>
                <option value="Buyer">Buyer</option>
                <option value="Seller">Seller</option>
                <option value="Both">Both</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required value="{{ $user->email }}">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required value="{{ $user->password }}">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="username">User Name:</label>
            <input type="text" name="user_name" id="username" class="form-control" required value="{{ $user->user_name }}">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="firstname">First Name:</label>
            <input type="text" name="first_name" id="firstname" class="form-control" required value="{{ $user->first_name }}">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="lastname">Last Name:</label>
            <input type="text" name="last_name" id="lastname" class="form-control" required value="{{ $user->last_name }}">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="telephonecode">Telephone Code:</label>
            <input type="number" name="telephone_code" id="telephonecode" class="form-control" required maxlength="5" value="{{ $user->telephone_code }}">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="area">Area:</label>
            <input type="text" name="area" id="area" class="form-control" required value="{{ $user->area }}">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="phonenumber">Phone Number:</label>
            <input type="number" name="phone_number" id="phonenumber" class="form-control" required maxlength="5" value="{{ $user->phone_number }}">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="address">Adress:</label>
            <input type="text" name="address" id="address" class="form-control" required value="{{ $user->address }}">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file" accept="image/*" >
            <img src="{{ asset( $user->image )}}" width="100"  class="mt-3"  alt="">
        </div>
        <div class="form-group mb-3 mt-3">
            <button type="submit" class="btn btn-danger">Save</button>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection
