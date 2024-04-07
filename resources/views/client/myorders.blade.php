@foreach ($orders as $order)
    <p>{{ $order->order_code }}</p>
    <p>{{ $order->total_amount }}</p>
    <p>{{ $order->status }}</p>
    <!-- Hiển thị thêm thông tin khác của đơn hàng -->
    <hr>
@endforeach