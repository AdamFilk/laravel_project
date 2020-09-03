<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transportation;
use\App\Location;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transportations = Transportation::all();
        return view('backend.transportation.list',compact('transportations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $locations = Location::all();
        return view('backend.transportation.new',compact('locations'));
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

            'name' =>['required', 'string', 'max:255','unique:transportations'],
            'type' =>['required', 'string', 'max:255','unique:transportations'],
            'photo' =>'required|mimes:jpeg,bmp,png,jpg'
        ]);

      if($validator)
        {   

            $type = $request->type;
            $name = $request->name;
            $photo = $request->photo;
            $price = $request->price;
            $location = $request->locationid;
            

            
           //file upload
            $imageName = time().'.'.$photo->extension();

            //move photo in location
            $photo->move(public_path('images/transportation'),$imageName);


            //store database
            $filepath = 'images/transportation/'.$imageName;

            //data insert
            $transportation = new Transportation;
            $transportation->type = $type;
            $transportation->name = $name;
            $transportation->photo = $filepath;
            $transportation->price = $price;
            $transportation->locationid = $location;
            
            $transportation->save();

            return redirect()->route('backside.transportation.index')->with("successMsg",'is ADDED in your data');
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
        $transportation = Transportation::find($id);
        /*dd($category);*/

        $locations = Location::all();
        return view('backend.transportation.edit',compact('transportation','locations'));
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
        
        $type = $request->type;
        $name = $request->name;
        $price = $request->price;
        $newphoto = $request->photo;
        $oldphoto = $request->oldphoto;
        $location = $request->locationid;

        
        if ($request->hasFile('photo')) {
           

            //file upload
        $imageName = time().'.'.$newphoto->extension();

        //move photo in location
        $newphoto->move(public_path('images/transportation'),$imageName);


        //store database
        $filepath = 'images/transportation/'.$imageName;


        //delete oldphoto
        if (\File::exists(public_path($oldphoto))) {
            \File::delete(public_path($oldphoto));
        }

        }else{
            $filepath = $oldphoto;
        }

        //data_upate
        $transportation = Transportation::find($id);
        $transportation ->type = $type;
        $transportation ->name = $name;
        $transportation ->price = $price;
        $transportation ->photo = $filepath;
        $transportation->locationid = $location;
        $transportation-> save();

        return redirect()->route('backside.transportation.index')->with('successMsg', 'Existing Transportation is UPDATED in your data');

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transportation= Transportation::find($id);
        $transportation->delete();

        return redirect()->route('backside.transportation.index')->with('successMsg', 'have been deleted!');
    }
}
