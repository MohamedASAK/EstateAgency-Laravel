<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminsData = DB::table("admins")->paginate(5);
        return view('admins.index', compact('adminsData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.create');
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
        DB::table('admins')->insert([
            'id'=>NULL,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'nid'=>$request->nid,
            'image'=>$image_name,
            'image_path'=>$image_path,
            'salary'=>$request->salary,
            'theme'=>"light",
            'rule'=>$request->rule,
            'create_at'=>NULL
        ]);
        return redirect()->back()->with("done","Create Admin Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = DB::table("admins")->where('id','=',$id)->paginate(10);
        return view('admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = DB::table("admins")->where('id','=',$id)->paginate(10);
        return view('admins.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = DB::table("admins")->where('id','=',$id)->first();
        $image_data = $request->file('image');
        if($image_data == null){
            $image_name = $admin->image;
        }
        else{
            $image_name = time(). rand(0,255). rand(0,255). $image_data->getClientOriginalName();
            $image_extension = $image_data->getClientOriginalExtension();
            $location = public_path('upload/');
            $image_data->move($location,$image_name);
            $image_path = public_path('upload/'). $image_name;
        }
        DB::table('admins')->where('id', '=' , $id)->update([
            'id'=>NULL,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'nid'=>$request->nid,
            'image'=>$image_name ,
            'image_path'=>$image_path,
            'salary'=>$request->salary,
            'theme'=>"light",
            'rule'=>$request->rule,
            'create_at'=>NULL
        ]);
        return redirect()->route('admin.index')->with("done","Update Admin Data Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = DB::table("admins")->where('id','=',$id)->delete();
        return redirect()->route('admin.index')->with("done","Delete Admin Data Successfully");
    }
}
