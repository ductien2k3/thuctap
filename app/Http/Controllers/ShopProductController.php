<?php

namespace App\Http\Controllers;

use App\Models\Shop_category;
use App\Models\Shop_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ShopProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Hiển thị danh sách sản phẩm.
     */
    public function index()
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại

        $data = Shop_product::with('shop_category')
            ->whereHas('shop_category', function ($query) use ($shopId) {
                $query->where('shop_id', $shopId); // Chỉ lấy các sản phẩm thuộc danh mục của cửa hàng hiện tại
            })
            ->latest('id')
            ->paginate(5);

        return view('client.shop.products.index', compact('data'));
    }

    /**
     * Hiển thị form tạo sản phẩm.
     */
    public function create()
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại
        $shop_category = Shop_category::where('shop_id', $shopId)->pluck('name', 'id')->all();
        return view('client.shop.products.create', compact('shop_category'));
    }

    /**
     * Lưu thông tin sản phẩm mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('shop_products', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }
        $data['shop_id'] = $shopId; // Gán ID của cửa hàng hiện tại vào trường 'shop_id'

        Shop_product::query()->create($data);
        return redirect()->route('myshop.products.index');
    }

    /**
     * Hiển thị thông tin sản phẩm.
     */
    public function show($id)
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại
        $shop_product = Shop_product::where('shop_id', $shopId)->findOrFail($id);
        return view('client.shop.products.show', compact('shop_product'));
    }

    /**
     * Hiển thị form chỉnh sửa sản phẩm.
     */
    public function edit($id)
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại
        $shop_category = Shop_category::where('shop_id', $shopId)->pluck('name', 'id')->all();
        $shop_product = Shop_product::where('shop_id', $shopId)->findOrFail($id);
        return view('client.shop.products.edit', compact('shop_product', 'shop_category'));
    }

    /**
     * Cập nhật thông tin sản phẩm.
     */
    public function update(Request $request, $id)
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại
        $shop_product = Shop_product::where('shop_id', $shopId)->findOrFail($id);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('shop_products', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }

        $currentImage = $shop_product->image;
        $shop_product->update($data);
        if ($request->hasFile('image') && $currentImage && file_exists(public_path($currentImage))) {
            unlink(public_path($currentImage));
        }
        return back();
    }

    /**
     * Xóa sản phẩm.
     */
    public function destroy($id)
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại
        $shop_product = Shop_product::where('shop_id', $shopId)->findOrFail($id);
        $shop_product->delete();
        if ($shop_product->image && file_exists(public_path($shop_product->image))) {
            unlink(public_path($shop_product->image));
        }
        return redirect()->route('myshop.products.index');
    }
}
