<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::query()->with(relations: 'category')->latest('id')->paginate(5); // Sử dụng latest() thay vì lastest() và truyền 'id' vào hàm latest()

        // return view('admin.categories.index', compact('data')); // Loại bỏ 'view' và 'var_name'
        return view('admin.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('products', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }

        Product::query()->create($data);
        return redirect()->route('products.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        return view('admin.products.edit', compact('categories', 'product'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('products', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }

        $currentImage = $product->image;
        $product->update($data);
        if ($request->hasFile('image') && $currentImage && file_exists(public_path($currentImage))) {
            unlink(public_path($currentImage));
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        return redirect()->route('products.index');
    }
}
