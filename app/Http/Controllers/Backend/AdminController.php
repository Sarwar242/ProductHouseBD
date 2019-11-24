<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function homeadmin()
    {
        $products = Product::all();
        $pronum = $products->count();
        return view('admin.dashboard')->with('pronum', $pronum);

    }
}