<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
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
        $userId = Auth::id();
        $shop = Shop::where('user_id', $userId)->first();
        return view('client.shop.index', compact('shop'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Auth::user();
        return view('client.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('shops', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }

        Shop::query()->create($data);
        return redirect()->route('shop.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        $userId = Auth::id();
        $shop = Shop::where('user_id', $userId)->first();
        return view('client.shop.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $pathFile = Storage::putFile('shops', $request->file('image'));
            $data['image'] = 'storage/' . $pathFile;
        }

        $currentImage = $shop->image;
        $shop->update($data);
        if ($request->hasFile('image') && $currentImage && file_exists(public_path($currentImage))) {
            unlink(public_path($currentImage));
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }

    
}
