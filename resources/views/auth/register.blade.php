@extends('layouts.login_register')

@section('content')
    <div class="register">
        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf
            <div>
                <label for="country">Country/Region: </label>
                <select id="country" name="country" class="@error('country') is-invalid @enderror"
                    value="{{ old('country') }}" required autocomplete="country">
                    <option value="Vietnam">Vietnam</option>
                    <option value="English">English</option>
                    <option value="China">China</option>
                    <option value="USA">USA</option>
                </select>
                @error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label>Please select trade role: </label>
                <div class="checkbox-group">
                    <label class="inline-label">
                        <input type="checkbox" name="role" value="Buyer" class="@error('role') is-invalid @enderror" autocomplete="role">
                        Buyer
                    </label>
                    <label class="inline-label">
                        <input type="checkbox" name="role" value="Seller" class="@error('role') is-invalid @enderror" autocomplete="role">
                        Seller
                    </label>
                    <label class="inline-label">
                        <input type="checkbox" name="role" value="Both" class="@error('role') is-invalid @enderror" autocomplete="role">
                        Both
                    </label>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            


            <div>
                <label for="email">Email Address: </label>
                <input type="email" id="email" name="email" placeholder="Please set the email as the login name."
                    class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label for="password">Login Password: </label>
                <input type="password" id="password" name="password" placeholder="Please set the login password."
                    class="@error('password') is-invalid @enderror" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="password_confirmation"
                    placeholder="Enter the login password again" required autocomplete="new-password">
            </div>

            <div>
                <label for="user_name">User Name:</label>
                <input type="text" placeholder="Please enter your user name"
                    class="@error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}"
                    required autocomplete="user_name" autofocus>
                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label for="full-name">Full name:</label>
                <input type="text" id="first-name" name="first_name" placeholder="Please enter your first name"
                    class="first-name @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required
                    autocomplete="first_name">
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="text" id="last-name" name="last_name" placeholder="Please enter your last name"
                    class=" first-name @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required
                    autocomplete="last_name">
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div>
                <label for="tel">Tel: </label>
                <input type="number" maxlength="5" id="tel" name="telephone_code" required placeholder="84"
                    class="tel @error('telephone_code') is-invalid @enderror" value="{{ old('telephone_code') }}"
                    required autocomplete="telephone_code">
                @error('telephone_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="text" id="area" name="area" required placeholder="area"
                    class="area @error('area') is-invalid @enderror" value="{{ old('area') }}" required
                    autocomplete="area">
                @error('area')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="tel" id="phone-number" maxlength="10" name="phone_number" required
                    placeholder="phone number" class="phone-number @error('phone_number') is-invalid @enderror"
                    value="{{ old('phone_number') }}" required autocomplete="phone_number">
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="agree-container">
                <input type="checkbox" id="agree" name="agree" required>
                <label for="agree">I agree to (a) <a href="#">Free Membership Agreement</a>, <br>(b) <a
                        href="#">Terms of Use</a>, and (c) <a href="#">Privacy Policy</a>. I agree to <br>
                    receive
                    more information from Alibaba.com about its <br>
                    products and services.</label>
            </div>

            <button type="submit">Agree and Register</button>
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            var checkboxes = document.querySelectorAll('input[name="role"]:checked');
            if (checkboxes.length === 0) {
                alert('Please select at least one trade role.');
                event.preventDefault();
            }
        });

        // Xử lý khi đăng ký thành công
        @if (session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>
@endpush

