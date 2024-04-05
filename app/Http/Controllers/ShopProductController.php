<?php

namespace App\Http\Controllers;

use App\Models\Shop_category;
use App\Models\Shop_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopProductController extends Controller
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
        $data = Shop_product::with('shop_category')->latest('id')->paginate(5);
        return view('client.shop.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shop_category = Shop_category::query()->pluck('name', 'id')->all();
        return view('client.shop.products.create', compact('shop_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('shop_products', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }

        Shop_product::query()->create($data);
        return redirect()->route('myshop.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $shop_product = Shop_product::find($id);
        return view('client.shop.products.show', compact('shop_product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shop_category = Shop_category::pluck('name', 'id')->all();
        $shop_product = Shop_product::find($id);
        return view('client.shop.products.edit', compact('shop_product', 'shop_category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $shop_product = Shop_product::find($id);
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
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shop_product = Shop_product::find($id);
        $shop_product->delete();
        if ($shop_product->image && file_exists(public_path($shop_product->image))) {
            unlink(public_path($shop_product->image));
        }
        return redirect()->route('myshop.products.index');
    }
}
