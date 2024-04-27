<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propertiesData = DB::table("properties")->paginate(5);
        $adminsData = DB::table("admins")->get();
        $agentsData = DB::table("agents")->get();
        $developersData = DB::table("real_estate_developers")->get();
        return view('properties.index', compact('propertiesData','adminsData','developersData','agentsData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image_data = $request->file('image');
        $image_name = time(). rand(0,255). rand(0,255). $image_data->getClientOriginalName();
        $image_extension = $image_data->getClientOriginalExtension();
        $location = public_path('upload/');
        $image_data->move($location,$image_name);
        $image_path = public_path('upload/'). $image_name;
        DB::table('properties')->insert([
            'id'=>NULL,
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'location'=>$request->location,
            'image'=>$image_name,
            'image_path'=>$image_path,
            'sales_agent'=>$request->sales_agent,
            'admin_id'=>$request->admin_id,
            'real_estate_developer'=>$request->real_estate_developer,
            'create_at'=>NULL
        ]);
        return redirect()->back()->with("done","Create Property Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = DB::table("properties")->where('id','=',$id)->paginate(10);
        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = DB::table("properties")->where('id','=',$id)->paginate(10);
        return view('properties.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $property = DB::table("properties")->where('id','=',$id)->first();
        $image_data = $request->file('image');
        if($image_data == null){
            $image_name = $property->image;
        }
        else{
            $image_name = time(). rand(0,255). rand(0,255). $image_data->getClientOriginalName();
            $image_extension = $image_data->getClientOriginalExtension();
            $location = public_path('upload/');
            $image_data->move($location,$image_name);
            $image_path = public_path('upload/'). $image_name;
        }
        DB::table('properties')->where('id', '=' , $id)->update([
            'id'=>NULL,
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'location'=>$request->location,
            'image'=>$image_name,
            'image_path'=>$image_path,
            'sales_agent'=>$request->agent,
            'admin_id'=>$request->admin,
            'real_estate_developer'=>$request->developer,
            'create_at'=>NULL
        ]);
        return redirect()->route('property.index')->with("done","Update Property Data Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = DB::table("properties")->where('id','=',$id)->delete();
        return redirect()->route('property.index')->with("done","Delete Property Data Successfully");
    }
}
