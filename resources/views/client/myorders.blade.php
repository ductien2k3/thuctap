@extends('layouts.layoutchung')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center my-4">Danh sách đơn hàng của bạn</h2>
                @foreach ($orders as $order)
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>Mã đơn hàng: <strong>{{ $order->order_code }}</strong></span>
                            <span>Tổng tiền: <strong>{{ number_format($order->total_amount) }} VND</strong></span>
                        </div>
                        <div class="card-body">
                            <p>Địa chỉ: {{ $order->address }}</p>
                            <p>Email: {{ $order->email }}</p>
                            <p>Số điện thoại: {{ $order->phone_number }}</p>
                            <p>Ghi chú: {{ $order->textnote }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            Trạng thái: {{ $order->status }}
                            <div class="mt-3">
                                <a href="{{ route('myorders.show', $order->id) }}" class="btn btn-info">Chi tiết</a>
                                @if($order->status != 'Đã huỷ')
                                    <div class="mt-3">
                                        <form action="{{ route('myorders.cancel', $order->id) }}" method="POST"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn huỷ đơn hàng này?')">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning">Huỷ</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $orders->links() }}
    </div>
@endsection