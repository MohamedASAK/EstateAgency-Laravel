<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developersData = DB::table("real_estate_developers")->paginate(5);
        return view('developers.index', compact('developerData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('developers.create');
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
        DB::table('real_estate_developers')->insert([
            'id'=>NULL,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'image'=>$image_name,
            'image_path'=>$image_path,
            'salary'=>$request->salary,
            'create_at'=>NULL
        ]);
        return redirect()->back()->with("done","Create Developer Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $developer = DB::table("real_estate_developers")->where('id','=',$id)->paginate(10);
        return view('developers.show', compact('developer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $developer = DB::table("real_estate_developers")->where('id','=',$id)->paginate(10);
        return view('developers.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $developer = DB::table("real_estate_developers")->where('id','=',$id)->first();
        $image_data = $request->file('image');
        if($image_data == null){
            $image_name = $developer->image;
        }
        else{
            $image_name = time(). rand(0,255). rand(0,255). $image_data->getClientOriginalName();
            $image_extension = $image_data->getClientOriginalExtension();
            $location = public_path('upload/');
            $image_data->move($location,$image_name);
            $image_path = public_path('upload/'). $image_name;
        }
        DB::table('real_estate_developers')->where('id', '=' , $id)->update([
            'id'=>NULL,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'image'=>$image_name ,
            'image_path'=>$image_path,
            'salary'=>$request->salary,
            'create_at'=>NULL
        ]);
        return redirect()->route('developer.index')->with("done","Update Developer Data Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $developer = DB::table("real_estate_developers")->where('id','=',$id)->delete();
        return redirect()->route('developer.index')->with("done","Delete Developer Data Successfully");
    }
}
