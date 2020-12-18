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


    public function AjaxSearch(Request $request){
        $key = $request->key;
        if(!is_null($key))
        { 
            $products = Product::orWhere('product_name', 'like', "%{$key}%")
            ->orWhere('product_details', 'like', "%{$key}%")
            ->orWhere('product_price', 'like', "%{$key}%")
            ->orWhere('product_code', 'like', "%{$key}%")
            ->get();
        }
        else
        {
            $products = Product::orderBy('product_name', 'ASC')->get();

        }
        if(is_null($products)){
            return response()->json([
                'success'=>false,
                'message'=>'no data found!',
            ]);
        }
        else{
            
            return response()->json([
                'success'=>true,
                'products'=>$products,
            ]);
        }
    }
}
