<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $req)
    {
        if($req->isMethod('post'))
        {
            $data= $req->all();

            $category= new Category;
            $category->name= $data['category_name'];
            $category->description= $data['description'];
            $category->url= $data['url'];

            $category->save();
            return redirect('/admin/add-category')->with('flash_message_success','One category added successfully!!! If you wanna see go to your "categories view" page.');
        }
        return view('admin.categories.add_category');
    }

    public function viewCategories()
    {
        $categories= Category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }
}
