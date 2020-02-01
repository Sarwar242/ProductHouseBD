<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubcategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::get();
        return view('Backend.subcategories.view_subcategories')->with(compact('subcategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('Backend.subcategories.add_subcategory')
            ->with('categories', $category);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory = Subcategory::create($this->validateRequest());
        $this->storeImage($subcategory);
        return redirect()->route('admin.addSubCategory')
            ->with('flash_message_success',
                'One Subcategory added successfully!!!
                 If you wanna see go to your "Subcategories view" page.');

    }

    private function validateRequest()
    {
        $validatedData = request()->validate([
            "name" => 'required',
            "category_id" => 'required',
            "description" => 'sometimes',
            "image" => 'sometimes|file|image|max:3000',
        ]);
        return $validatedData;
    }
    private function storeImage($category)
    {
        if (request()->hasFile('image')) {
            $category->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        $category = Category::all();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = Subcategory::find($id);
        $category = Category::all();

        session()->flash('flash_message_success', 'You can edit this sub-category now!');
        return view('Backend.subcategories.edit_subcategory')
            ->with('categories', $category)
            ->with('subcategory', $sub);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => 'required',
            "category_id" => 'required',
            "description" => 'sometimes',
            "image" => 'sometimes|file|image|max:3000',
        ]);
        $sub = Subcategory::find($id);
        $sub->name = $request->name;
        $sub->category_id = $request->category_id;
        $sub->description = $request->description;

        if (request()->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $sub->image = $path;
        }
        $sub->save();
        $subcategories = Subcategory::all();
        session()->flash('flash_message_success', 'You have updated a sub-category successfully!');
        return redirect()->route('admin.viewSubCategories')
            ->with(compact('subcategories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $subcategory = Subcategory::find($id);

        if (is_file($subcategory->image)) {
            Storage::delete($subcategory->image);
        }

        $subcategory->delete();
        session()->flash('flash_message_success', 'The subcategory has been deleted Successfully!');

        $subcategories = Subcategory::all();
        return redirect()->route('admin.viewSubCategories')
            ->with(compact('subcategories'));

    }

}