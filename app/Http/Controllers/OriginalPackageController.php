<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OriginalPackage;
use App\Location;
class OriginalPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $originalpackages = OriginalPackage::all();
       

        return view('backend.originalpackage.list',compact('originalpackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        

        return view('backend.originalpackage.new',compact('locations'));
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
            'name'  => ['required', 'string', 'max:255', 'unique:originalpackages'],
        ]);

        if ($validator) {
            $name = $request->name;
            $price = $request->price;
            $photo = $request->photo;
            $locationid = $request->locationid;
            
            


            // FILE UPLOAD

           //fileupload
            $imageName= time().'.'.$photo->extension();
            $photo->move(public_path('images/originalpackage'),$imageName);
            $filepath = 'images/originalpackage/'.$imageName;
            // $photoString = implode(',', $data);

            
            $originalpackage= new OriginalPackage();
           
            $originalpackage->name = $name;
            $originalpackage->price = $price;
            $originalpackage->photo = $filepath;
            $originalpackage->locationid = $locationid;
            
            $originalpackage->save();

            return redirect()->route('backside.originalpackage.index')->with("successMsg", "New Item is ADDED in your data");


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
         $originalpackage = OriginalPackage::find($id);
        /*dd($category);*/

        $locations = Location::all();
        return view('backend.originalpackage.edit',compact('originalpackage','locations'));
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
          
           
        
        if ($request->hasFile('photo')) {
           

            //file upload
        $imageName = time().'.'.$newphoto->extension();

        //move photo in location
        $newphoto->move(public_path('images/originalpackage'),$imageName);


        //store database
        $filepath = 'images/originalpackage/'.$imageName;


        //delete oldphoto
        if (\File::exists(public_path($oldphoto))) {
            \File::delete(public_path($oldphoto));
        }

        }else{
            $filepath = $oldphoto;
        }

        //data_upate
        $originalpackage = OriginalPackage::find($id);
        $originalpackage ->name = $name;
        $originalpackage ->price = $price;
        $originalpackage->photo = $filepath;
       
       
        $originalpackage-> save();

        return redirect()->route('backside.originalpackage.index')->with('successMsg', 'Existing Location is UPDATED in your data');

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
        $originalpackage = OriginalPackage::find($id);
        $originalpackage->delete();

        return redirect()->route('backside.originalpackage.index')->with('successMsg', 'have been deleted!');
    }
}
