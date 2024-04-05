<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Shop_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $data = Shop_category::with('shop')->latest('id')->paginate(5);
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
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('shop_category', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }

        Shop_category::query()->create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $defaultShopId = Shop::query()->value('id');
        $shop_category = Shop_category::find($id);
        return view('client.shop.categories.show', compact('shop_category', 'defaultShopId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $defaultShopId = Shop::query()->value('id');
        $shop_category = Shop_category::find($id);
        return view('client.shop.categories.edit', compact('defaultShopId', 'shop_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $shop_category = Shop_category::find($id);
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
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shop_category = Shop_category::find($id);
        $shop_category->delete();
        if ($shop_category->image && file_exists(public_path($shop_category->image))) {
            unlink(public_path($shop_category->image));
        }
        return redirect()->route('categories.index');
    }
}
