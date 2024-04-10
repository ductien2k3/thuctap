<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Shop_product;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function addToCart(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to add products to your cart');
        }

        // Lấy thông tin về sản phẩm và số lượng từ yêu cầu
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Kiểm tra xem sản phẩm có tồn tại hay không
        $product = Shop_product::find($productId);
        if (!$product) {
            // Xử lý khi sản phẩm không tồn tại
            return redirect()->back()->with('error', 'Product not found');
        }

        // Lưu thông tin sản phẩm vào giỏ hàng
        $cartItem = new CartItem();
        $cartItem->user_id = auth()->user()->id;
        $cartItem->product_name = $product->name;
        $cartItem->product_id = $productId;
        $cartItem->quantity = $quantity;
        $cartItem->price = $product->price;
        $cartItem->save();

        // Chuyển hướng về trang giỏ hàng hoặc trang sản phẩm vừa thêm vào giỏ hàng
        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }

    public function index()
    {
        // Lấy thông tin người dùng hiện tại
        $user = auth()->user();

        // Lấy các mục trong giỏ hàng thuộc về người dùng hiện tại
        $cartItems = CartItem::where('user_id', $user->id)->with('shop_product')->get();

        // Tính toán tổng chi phí của các mục trong giỏ hàng
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->shop_product->price * $item->quantity;
        }
        // Chuyển tới view cart.index với các mục giỏ hàng và chi phí tổng cộng
        return view('client.cart', ['items' => $cartItems, 'total' => $total]);
    }
    public function removeCartItem()
    {
        $this->where('user_id', auth()->id())->delete();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // app/Http/Controllers/CartController.php

    public function update(Request $request)
{
    // Lấy ID và số lượng từ request
    $id = $request->input('id');
    $quantity = $request->input('quantity');

    // Kiểm tra xem giỏ hàng có tồn tại không
    $cartItem = CartItem::find($id);
    if (!$cartItem) {
        return redirect()->back()->with('error', 'Cart item not found');
    }

    // Cập nhật số lượng của giỏ hàng
    $cartItem->quantity = $quantity;
    $cartItem->save();

    // Lưu số lượng mới vào session
    session(['quantity_' . $id => $quantity]);

    // Chuyển hướng người dùng trở lại trang giỏ hàng với thông báo thành công
    return redirect()->route('cart.index')->with('success', 'Cart item updated successfully');
}
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to manage your cart');
        }

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
        $cartItem = CartItem::where('user_id', auth()->user()->id)->where('id', $id)->first();
        if (!$cartItem) {
            // Xử lý khi sản phẩm không tồn tại trong giỏ hàng
            return redirect()->back()->with('error', 'Product not found in cart');
        }

        // Xoá sản phẩm khỏi giỏ hàng
        $cartItem->delete();

        // Chuyển hướng người dùng trở lại trang giỏ hàng với thông báo thành công
        return redirect()->route('cart.index')->with('success', 'Product removed from cart');
    }
}
