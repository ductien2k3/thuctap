<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class MyOrderController extends Controller
{
    public function index()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            // Lấy thông tin người dùng đã đăng nhập
            $user = Auth::user();

            // Truy vấn danh sách các đơn hàng của người dùng
            $orders = Order::where('user_id', $user->id)->latest()->paginate(5);

            // Chuyển dữ liệu sang view
            return view('client.myorders', compact('orders'));
        } else {
            // Nếu người dùng chưa đăng nhập, có thể xử lý theo ý của bạn
            return redirect()->route('login'); // Ví dụ: Chuyển hướng đến trang đăng nhập
        }
    }
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $products = $order->shop_products; // Sử dụng 'shop_products' trong quan hệ
        return view('client.detailmyorder', compact('order', 'products'));
    }   


    public function cancel(Order $order)
    {
        // Kiểm tra trạng thái của đơn hàng, chỉ cho phép huỷ đơn hàng nếu đang trong trạng thái "Đang xử lý"
        if ($order->status == 'Đang chờ xác nhận đơn hàng') {
            // Cập nhật trạng thái của đơn hàng sang "Đã huỷ"
            $order->update(['status' => 'Đã huỷ']);

            // Redirect về trang danh sách đơn hàng với thông báo
            return redirect()->route('myorders.index')->with('success', 'Đơn hàng đã được huỷ thành công.');
        }

        // Nếu đơn hàng không ở trạng thái "Đang xử lý", chuyển hướng với thông báo lỗi
        return redirect()->route('myorders.index')->with('error', 'Không thể huỷ đơn hàng đã hoàn thành hoặc đã bị huỷ.');
    }
}
