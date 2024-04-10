@extends('layouts.layoutchung')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center my-4">Chi tiết đơn hàng</h2>
                <div class="card mb-3">
                    <div class="card-header">
                        Mã đơn hàng: <strong>{{ $order->order_code }}</strong>
                    </div>
                    <div class="card-body">
                        <p>Địa chỉ: {{ $order->address }}</p>
                        <p>Email: {{ $order->email }}</p>
                        <p>Số điện thoại: {{ $order->phone_number }}</p>
                        <p>Ghi chú: {{ $order->textnote }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Trạng thái: {{ $order->status }}
                    </div>
                </div>
                <h4>Danh sách sản phẩm:</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products)
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price) }} VND</td>
                                    <td>{{ $product->pivot->quantity }}</td> <!-- Truy cập thông tin số lượng qua pivot -->
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
