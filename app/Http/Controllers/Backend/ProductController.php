<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function showCategoryForm()
    {
        $products = Product::all();
        $pronum = $products->count();

        return view('Backend.categories.add_category')
            ->with('pronum', $pronum);
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
        return view('Backend.categories.view_categories')
            ->with(compact('categories'));
    }

    public function editcategory($id)
    {
        $cd = Category::find($id);
        session()->flash('flash_message_success', 'You can edit this category now!');
        return view('Backend.categories.edit_category')
            ->with('category', $cd);
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
        return redirect()->route('admin.viewCategories')
            ->with(compact('categories'));
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        if (is_file($category->image)) {
            Storage::delete($category->image);
        }

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
            "subcategory" => 'required',
            "price" => 'required',
            "description" => 'required',
        ]);

        if ($request->isMethod('post')) {
            $product = new Product;
            $product->product_name = $request->name;
            $product->product_code = $request->code;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcategory;

            $product->product_price = $request->price;

            $product->product_details = $request->description;
            $product->product_discount = $request->discount;
            $product->product_quantity = $request->quantity;
            $product->save();
            $pid = Product::all()->last()->id;
            $files = $request->file('image');
            if (!empty($files)):
                foreach ($files as $file):
                    $path = $file->store('uploads', 'public');
                    $imagetbl = new ProductImage;
                    $imagetbl->image = $path;
                    $imagetbl->product_id = $pid;
                    $imagetbl->save();
                endforeach;
            endif;

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
            "category" => 'required',
            "subcategory" => 'required',
            "price" => 'required',
            "code" => 'required',
        ]);
        $product = Product::find($id);
        $product->product_name = $request->name;
        $product->product_code = $request->code;
        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory;

        $product->product_price = $request->price;
        $product->product_details = $request->description;
        $product->product_discount = $request->discount;
        $product->product_quantity = $request->quantity;

        $files = $request->file('image');
        if (!empty($files)) {

            foreach ($files as $file) {

                $path = $file->store('uploads', 'public');
                $imagetbl = new ProductImage;
                $imagetbl->image = $path;
                $imagetbl->product_id = $id;
                $imagetbl->save();
            }

        }
        $product->save();
        $products = Product::all();
        session()->flash('flash_message_success', 'You have updated a Product successfully!');
        return redirect()->route('admin.viewProducts')->with(compact('products'));
    }

    public function deleteProduct($id)
    {
        $pro = Product::find($id);
        if (!empty($pro->productImages->image)):
            foreach ($pro->productImages->image as $img):
                Storage::delete($img);
            endforeach;
        endif;
        $pro->delete();
        session()->flash('flash_message_success', 'The Product has been deleted Successfully!');
        $products = Product::all();
        return redirect()->route('admin.viewProducts')->with(compact('products'));

    }
    public function deleteProductImage($id)
    {
        $productimagetbl = ProductImage::find($id);
        Storage::delete($productimagetbl->image);
        File::delete($productimagetbl->image);
        $productimagetbl->delete();

        session()->flash('flash_message_success', 'The Product Image has been deleted Successfully!');

        return redirect()->route('admin.editproduct', $productimagetbl->product->id);

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

    public function uploadTest(Request $request, $id)
    {
        // print_r($request->all());
        $files = $request->file('image');
        if (!empty($files)):
            $i = 0;
            foreach ($files as $file):
                $path = $file->store('uploads', 'public');
                $i++;

                //  Storage::put($file->getClientOriginalName(), file_get_contents($file));
            endforeach;
            return $i;
        endif;

    }
}