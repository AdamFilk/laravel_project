<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Nature;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
       

        return view('backend.location.list',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $natures=Nature::all();
        $locations = Location::all();

        return view('backend.location.new',compact('locations','natures'));
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
            'name'  => ['required', 'string', 'max:255', 'unique:locations'],
            'natureid'  => ['required', 'string', 'max:255'],
        ]);

        if ($validator) {
            $name = $request->name;
            $price = $request->price;
            $photo = $request->photo;
            $natureid = $request->natureid;
            


            // FILE UPLOAD

           //fileupload
            $imageName= time().'.'.$photo->extension();
            $photo->move(public_path('images/location'),$imageName);
            $filepath = 'images/location/'.$imageName;
            // $photoString = implode(',', $data);

            
            $location= new Location();
           
            $location->name = $name;
            $location->price = $price;
            $location->photo = $filepath;
            $location->natureid = $natureid;
            $location->save();

            return redirect()->route('backside.location.index')->with("successMsg", "New Item is ADDED in your data");


        }else{
            return Redirect::back()->withErrors($validator);
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
        $natures=Nature::all();
        $location = Location::find($id);
       
        /*dd($category);*/

        return view('backend.location.edit',compact('location','natures'));
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
            $natureid = $request->natureid;
           
        
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
        $location = Location::find($id);
        $location ->name = $name;
        $location ->price = $price;
        $location->photo = $filepath;
        $location->natureid = $natureid;
       
        $location-> save();

        return redirect()->route('backside.location.index')->with('successMsg', 'Existing Location is UPDATED in your data');

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
        $location = Location::find($id);
        $location->delete();

        return redirect()->route('backside.location.index')->with('successMsg', 'have been deleted!');
    }
}
