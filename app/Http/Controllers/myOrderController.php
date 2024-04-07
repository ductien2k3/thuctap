<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class myOrderController extends Controller
{


    public function index()
    {
        // Lấy thông tin người dùng đã đăng nhập
        $user = Auth::user();

        // Truy vấn danh sách các đơn hàng của người dùng
        $orders = Order::latest('id')->get();

        return view('client.myorders', compact('orders'));
    }
}
