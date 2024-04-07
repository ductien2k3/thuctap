<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop_category;
use App\Models\Shop_product;

class ProductViewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $dataCategory = Shop_category::latest('id')->get();
    $dataProduct = Shop_product::latest('id')->paginate(5);

    // Kiểm tra dữ liệu đã được lấy thành công hay chưa
    // dd($dataCategory, $dataProduct);

    return view('client.product', compact('dataCategory', 'dataProduct'));
}

    
}
