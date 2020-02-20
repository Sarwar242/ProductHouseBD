<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('Backend.cities.view_cities')
            ->with('cities', $cities);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.cities.add_city');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => 'required',
            "shipping_cost" => 'required|Numeric',
        ]);
        $city = new City;
        $city->name = $request->name;
        $city->shipping_cost = $request->shipping_cost;
        $city->save();
        return redirect()->route('admin.addCity')
            ->with('flash_message_success',
                'One City added successfully!!!
                 If you wanna see go to your "Cities view" page.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        return view('Backend.cities.edit_city')
            ->with('city', $city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => 'required',
            "shipping_cost" => 'required|Numeric',
        ]);

        $city = City::find($id);
        $city->name = $request->name;
        $city->shipping_cost = $request->shipping_cost;
        $city->save();

        return redirect()->route('admin.viewCities')
            ->with('flash_message_success',
                'City edited successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
        return redirect()->route('admin.viewCities')
            ->with('flash_message_success',
                'A City has been deleted !!');

    }
}