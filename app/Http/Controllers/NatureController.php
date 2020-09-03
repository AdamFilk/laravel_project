<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nature;
class NatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $natures=Nature::all();
        return view('backend.nature.list',compact('natures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.nature.new');
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

            'name' =>['required', 'string', 'max:255','unique:natures'],
        ]);
        if($validator)
        { 
            $name = $request->name;
        
           

            //data insert
            $nature = new Nature;
            $nature->name = $name;
            
            $nature->save();

            return redirect()->route('backside.nature.index')->with("successMsg",'is ADDED in your data');
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
        $nature = Nature::find($id);
        /*dd($category);*/

        
        return view('backend.nature.edit',compact('nature'));
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
        
        

        //data_upate
        $nature = Nature::find($id);
        $nature ->name = $name;
        
        $nature-> save();

        return redirect()->route('backside.nature.index')->with('successMsg', 'Existing Nature is UPDATED in your data');

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
        $nature = Nature::find($id);
        $nature->delete();

        return redirect()->route('backside.nature.index')->with('successMsg', 'have been deleted!');
    }
}
