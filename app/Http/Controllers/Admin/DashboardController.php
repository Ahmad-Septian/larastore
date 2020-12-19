<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesanan;

class DashboardController extends Controller
{
    public function index()
    {

        return view('pages.admin.dashboard', [
            'product' => Product::count(),
            'pesanan' => Pesanan::count(),
            'pesanan_0' => Pesanan::where('status', '0')->count(),
            'pesanan_1' => Pesanan::where('status', '1')->count(),
            
        ]);
    }
}
