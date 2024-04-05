<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource. 
     * 
     * 
     
     */
    public function index()
    {


        $data = Category::query()->latest('id')->paginate(5); // Sử dụng latest() thay vì lastest() và truyền 'id' vào hàm latest()

        // return view('admin.categories.index', compact('data')); // Loại bỏ 'view' và 'var_name'
        return view('admin.categories.index', compact('data')); // Sửa thành view và var_name

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
        return view('admin.categories.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('categories', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }

        Category::query()->create($data);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
 
        return view('admin.categories.show', compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('categories', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }

        $currentImage = $category->image;
        $category->update($data);
        if ($request->hasFile('image') && $currentImage && file_exists(public_path($currentImage))) {
            unlink(public_path($currentImage));
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }
        return redirect()->route('admin.categories.index');
    }
}
