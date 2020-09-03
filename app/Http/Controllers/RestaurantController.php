<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use\App\Location;



class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $restaurants = Restaurant::all();
        return view('backend.restaurant.list',compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $locations = Location::all();
        return view('backend.restaurant.new',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([

            'name' =>['required', 'string', 'max:255','unique:restaurants'],
            'photo' =>'required|mimes:jpeg,bmp,png,jpg'
        ]);

      if($validator)
        { 
            $name = $request->name;
            $price = $request->price;
            $photo = $request->photo;
            $location = $request->locationid;

            
           //file upload
            $imageName = time().'.'.$photo->extension();

            //move photo in location
            $photo->move(public_path('images/restaurant'),$imageName);


            //store database
            $filepath = 'images/restaurant/'.$imageName;

            //data insert
            $restaurant = new Restaurant;
            $restaurant->name = $name;
            $restaurant->price = $price;
            $restaurant->photo = $filepath;
            $restaurant->locationid = $location;
            $restaurant->save();

            return redirect()->route('backside.restaurant.index')->with("successMsg",'is ADDED in your data');
        } else{
                return redirect::back()->withErrors($validator);
        }
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
        $restaurant = Restaurant::find($id);
        /*dd($category);*/

        $locations = Location::all();
        return view('backend.restaurant.edit',compact('restaurant','locations'));
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
         {
        $name = $request->name;
        $price = $request->price;
        $newphoto = $request->photo;
        $oldphoto = $request->oldphoto;
        $location = $request->locationid;
        
        if ($request->hasFile('photo')) {
           

            //file upload
        $imageName = time().'.'.$newphoto->extension();

        //move photo in location
        $newphoto->move(public_path('images/restaurant'),$imageName);


        //store database
        $filepath = 'images/restaurant/'.$imageName;


        //delete oldphoto
        if (\File::exists(public_path($oldphoto))) {
            \File::delete(public_path($oldphoto));
        }

        }else{
            $filepath = $oldphoto;
        }

        //data_upate
        $restaurant = Restaurant::find($id);
        $restaurant ->name = $name;
        $restaurant ->price = $price;
        $restaurant ->photo = $filepath;
        $restaurant->locationid = $location;
        $restaurant-> save();

        return redirect()->route('backside.restaurant.index')->with('successMsg', 'Existing Restaurant is UPDATED in your data');

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();

        return redirect()->route('backside.restaurant.index')->with('successMsg', 'have been deleted!');
    }
}
