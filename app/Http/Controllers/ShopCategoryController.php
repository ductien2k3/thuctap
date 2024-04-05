<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Shop_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ShopCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại

        $data = Shop_category::with('shop')
            ->where('shop_id', $shopId) // Chỉ lấy các danh mục của cửa hàng hiện tại
            ->latest('id')
            ->paginate(5);

        return view('client.shop.categories.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Lấy ra id của cửa hàng mặc định
        $defaultShopId = Shop::query()->value('id');

        return view('client.shop.categories.create', compact('defaultShopId'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('shop_category', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }

        $data['shop_id'] = $shopId; // Gán ID của cửa hàng hiện tại vào trường 'shop_id'

        Shop_category::query()->create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    /**
     * Hiển thị thông tin danh mục.
     */
    public function show($id)
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại
        $defaultShopId = Shop::query()->value('id');
        $shop_category = Shop_category::where('shop_id', $shopId)->findOrFail($id);
        return view('client.shop.categories.show', compact('shop_category', 'defaultShopId'));
    }

    /**
     * Hiển thị form chỉnh sửa danh mục.
     */
    public function edit($id)
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại
        $defaultShopId = Shop::query()->value('id');
        $shop_category = Shop_category::where('shop_id', $shopId)->findOrFail($id);
        return view('client.shop.categories.edit', compact('defaultShopId', 'shop_category'));
    }

    /**
     * Cập nhật thông tin danh mục.
     */
    public function update(Request $request, $id)
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại
        $shop_category = Shop_category::where('shop_id', $shopId)->findOrFail($id);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('products', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }

        $currentImage = $shop_category->image;
        $shop_category->update($data);
        if ($request->hasFile('image') && $currentImage && file_exists(public_path($currentImage))) {
            unlink(public_path($currentImage));
        }
        return back();
    }

    /**
     * Xóa danh mục.
     */
    public function destroy($id)
    {
        $shopId = Auth::user()->shop->id; // Lấy ID của cửa hàng hiện tại
        $shop_category = Shop_category::where('shop_id', $shopId)->findOrFail($id);
        $shop_category->delete();
        if ($shop_category->image && file_exists(public_path($shop_category->image))) {
            unlink(public_path($shop_category->image));
        }
        return redirect()->route('categories.index');
    }
}
