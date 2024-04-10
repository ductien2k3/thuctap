<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class customerController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Lấy danh sách các đơn hàng đã mua từ cửa hàng của người dùng hiện tại
        $orders = Order::whereHas('shop_products', function ($query) use ($userId) {
            $query->where('shop_id', $userId); // Chỉ lấy các đơn hàng từ cửa hàng của người dùng hiện tại
        })
            ->with('user')
            ->latest()
            ->paginate(5);

        return view('client.shop.orderShop', compact('orders'));
    }

    public function show($id)
{
    $order = Order::with('shop_products')->findOrFail($id);

    return view('client.shop.orderShow', compact('order'));
}
public function edit($id)
{
    $order = Order::with('shop_products')->findOrFail($id);

    return view('client.shop.orderUpdate', compact('order'));
}
public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công');
    }
}
