<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use File;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('priority', 'asc')->get();
        return view('Backend.sliders.index')->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('Backend.sliders.addnew')
            ->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = Slider::create($this->validateRequest());
        $this->storeImage($slider);
        return redirect()->route('admin.slider.add')
            ->with('flash_message_success',
                'One Slide added successfully!!!
                 If you wanna see go to your "Slide view" page.');

    }

    private function validateRequest()
    {
        $validatedData = request()->validate([
            "title" => 'required',
            "product_id" => 'sometimes',
            "button_text" => 'sometimes',
            "button_link" => 'sometimes',
            "priority" => 'required',
            "image" => 'required|file|image|max:3000',
        ]);
        return $validatedData;
    }
    private function storeImage($slider)
    {
        if (request()->hasFile('image')) {
            $slider->update([
                'image' => request()->image->store('sliders', 'public'),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $products = Product::orderBy('id', 'desc')->get();

        $slider = Slider::find($id);
        return view('Backend.sliders.edit')
            ->with('products', $products)
            ->with('slider', $slider);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "title" => 'required',
            "product_id" => 'sometimes',
            "button_text" => 'sometimes',
            "button_link" => 'sometimes',
            "priority" => 'required',
            "image" => 'sometimes|file|image|max:3000',
        ]);
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->product_id = $request->product_id;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;

        if (request()->hasFile('image')) {
            if (File::exists('storage/' . $slider->image)) {
                File::delete('storage/' . $slider->image);
            }

            $path = $request->file('image')->store('sliders', 'public');
            $slider->image = $path;
        }
        $slider->save();
        $sliders = Slider::all();
        session()->flash('flash_message_success', 'You have updated a slider successfully!');
        return redirect()->route('admin.sliders')
            ->with(compact('sliders'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $slider = Slider::find($id);
        if (!is_null($slider)) {
            //DeleteImage
            if (File::exists('storage/' . $slider->image)) {
                File::delete('storage/' . $slider->image);
            }
        }
        $slider->delete();
        session()->flash('flash_message_success', 'The Slide has been deleted Successfully!');
        return back();
    }
}