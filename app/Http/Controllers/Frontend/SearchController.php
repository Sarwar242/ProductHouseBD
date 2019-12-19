<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $key = $request->search;
        $product = Product::orWhere('product_name', 'like', '%' . $key . '%')
            ->orWhere('product_details', 'like', '%' . $key . '%')
            ->orWhere('product_price', 'like', '%' . $key . '%')
            ->orWhere('product_code', 'like', '%' . $key . '%')
            ->orderBy('id', 'desc')
            ->get();
        return view('Frontend.search.result')->with('products', $product)
            ->with('search', $key);
    }
}