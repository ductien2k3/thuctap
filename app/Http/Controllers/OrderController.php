<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->with('shop_product')->get();
        $total = 0;
        $ship = 30;
        foreach ($cartItems as $item) {
            $total += $item->shop_product->price * $item->quantity;
        }
        $total_amount = $total + $ship;

        return view('client.orders', compact('cartItems', 'total', 'ship', 'total_amount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        // Tạo đối tượng Order mới
        $order = new Order();
        $order->user_id = $userId;

        // Kết hợp first_name và last_name thành một chuỗi và gán vào trường name
        $name = $request->input('first_name') . ' ' . $request->input('last_name');
        $order->name = $name;
        $orderCode = Str::random(5);
        $order->order_code = $orderCode;
        // Gán các giá trị từ biểu mẫu vào đối tượng Order
        $order->address = $request->input('address');
        $order->total_amount = $request->input('total_amount');
        $order->email = $request->input('email');
        $order->textnote = $request->input('textnote');
        $order->phone_number = $request->input('phone_number');
        $order->status = 'Đang chờ xác nhận đơn hàng'; // Mặc định là đang chờ xác nhận
        $order->payment = $request->input('payment');
        $order->order_date = Carbon::now()->format('Y-m-d H:i:s');


        // Lưu đơn hàng vào cơ sở dữ liệu
        $order->save();
        CartItem::where('user_id', auth()->id())->delete();


        // Xóa giỏ hàng trong session
       
        // Chuyển hướng người dùng sau khi lưu thành công
        return redirect()->route('home.index')->with('success', 'Order created successfully');
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
