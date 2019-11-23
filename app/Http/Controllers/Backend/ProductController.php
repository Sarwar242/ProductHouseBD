<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showCategoryForm()
    {
        return view('admin.categories.add_category');
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

    public function viewCategories()
    {
        $categories = Category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
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