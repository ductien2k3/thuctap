<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Shop_category;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    $data = Shop_category::latest('id')->get(); // Sử dụng get() để lấy dữ liệu

    // Kiểm tra dữ liệu đã được lấy thành công hay chưa
    // dd($data);

    return view('client.index', compact('data'));
}


}
