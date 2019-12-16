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

        return view('Backend.categories.add_category')->with('pronum', $pronum);
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
        return view('Backend.categories.view_categories')->with(compact('categories'));
    }

    public function editcategory($id)
    {
        $cd = Category::find($id);
        session()->flash('flash_message_success', 'You can edit this category now!');
        return view('Backend.categories.edit_category')->with('category', $cd);
    }

    public function updatecategory(Request $request, $id)
    {
        $this->validate($request, [
            "name" => 'required',
            "description" => 'required',
            "image" => 'sometimes|file|image|max:3000',
        ]);
        $cd = Category::find($id);
        $cd->name = $request->name;
        $cd->description = $request->description;

        if (request()->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $cd->image = $path;
        }
        $cd->save();
        $categories = Category::all();
        session()->flash('flash_message_success', 'You have updated a category successfully!');
        return redirect()->route('admin.viewCategories')->with(compact('categories'));

    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('flash_message_success', 'The category has been deleted Successfully!');

        $categories = Category::all();
        return redirect()->route('admin.viewCategories')->with(compact('categories'));

    }
    /** ------------ Products --------------- */

    public function showProductForm()
    {
        $categories = Category::get();

        return view('Backend.products.add_product')
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
            $product->product_quantity = $request->quantity;

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
        return view('Backend.products.view_products')->with(compact('products'));
    }

    public function editProduct($id)
    {
        $categories = Category::all();

        $pro = Product::find($id);
        session()->flash('flash_message_success', 'You can edit this Product now!');
        return view('Backend.products.edit_product')->with('categories', $categories)->with('product', $pro);
    }

    public function updateProduct(Request $request, $id)
    {
        $this->validate($request, [
            "name" => 'required',
            "description" => 'required',
            "image" => 'sometimes|file|image|max:3000',
        ]);
        $product = Product::find($id);
        $product->product_name = $request->name;
        $product->product_code = $request->code;
        $product->category_id = $request->category;
        $product->product_price = $request->price;
        $product->product_details = $request->description;
        $product->product_discount = $request->discount;
        $product->product_quantity = $request->quantity;

        if (request()->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $cd->image = $path;
        }
        $product->save();
        $products = Product::all();
        session()->flash('flash_message_success', 'You have updated a category successfully!');
        return redirect()->route('admin.viewCategories')->with(compact('categories'));

    }

    public function deleteProduct($id)
    {
        $pro = Product::find($id);
        $pro->delete();
        session()->flash('flash_message_success', 'The Product has been deleted Successfully!');

        $products = Product::all();
        return redirect()->route('admin.viewProducts')->with(compact('products'));

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