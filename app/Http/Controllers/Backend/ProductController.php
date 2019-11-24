<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showCategoryForm()
    {
        $products = Product::all();
        $pronum = $products->count();

        return view('admin.categories.add_category')->with('pronum', $pronum);
    }
    public function categoryStore(Request $request)
    {
        if ($request->isMethod('post')) {
            $category = Category::create($this->validateRequest());
            $this->storeImage($category);
            return redirect()->route('admin.addCategory')
                ->with('flash_message_success',
                    'One category added successfully!!! If you wanna see go to your "categories view" page.');
        }

    }

    public function categoryShow()
    {
        $categories = Category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }

    public function showProductForm()
    {
        $categories = Category::get();

        return view('admin.products.add_product')
            ->with('categories', $categories);
    }
    public function productStore(Request $request)
    {
        $this->validate($request, [
            "name" => 'required',
            "code" => 'required|max:10',
            "category" => 'required',
            "price" => 'required',
            "description" => 'required',
            "image" => 'sometimes|file|image|max:3000',
        ]);

        if ($request->isMethod('post')) {
            $product = new Product;
            $product->product_name = $request->name;
            $product->product_code = $request->code;
            $product->category_id = $request->category;
            $product->product_price = $request->price;
            $product->product_details = $request->description;
            $product->product_discount = $request->discount;

            $image = new ProductImage;
            if (request()->hasFile('image')) {
                $path = $request->file('image')->store('uploads', 'public');
                $image->image = $path;
            }

            $image->product_code = $request->code;

            $product->save();
            $image->save();

            return redirect()->route('admin.addProduct')
                ->with('flash_message_success',
                    'One Product added successfully!!! If you wanna see go to your "Products view" page.');
        }

    }

    public function productShow()
    {
        $products = Product::get();
        return view('admin.products.view_products')->with(compact('products'));
    }

    private function validateRequest()
    {
        $validatedData = request()->validate([
            "name" => 'required',
            "description" => 'required',
            "image" => 'sometimes|file|image|max:3000',
        ]);
        return $validatedData;

    }

    // private function validateRequest()
    // {
    //     $validatedData = request()->validate([
    //         "name" => 'required',
    //         "description" => 'required',
    //     ]);

    //     if (request()->hasFile('image')) {
    //         request()->validate([
    //             "image" => 'file|image|3000',
    //         ]);

    //     }
    //     return $validatedData;

    // }
    // private function validateRequest()
    // {
    //     return tap(request()->validate([
    //         "name" => 'required',
    //         "description" => 'required',
    //     ]),function(){
    //              if (request()->hasFile('image')) {
    //                   request()->validate([
    //                  "image" => 'file|image|3000',
    //                   ]);}
    //              }
    //      );
    //     return $validatedData;

    // }

    private function storeImage($category)
    {
        if (request()->hasFile('image')) {
            $category->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

        }

    }
}