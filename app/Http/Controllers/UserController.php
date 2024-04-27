<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersData = DB::table("users")->paginate(5);
        return view('users.index', compact('userData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
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
        DB::table('users')->insert([
            'id'=>NULL,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'nid'=>$request->nid,
            'image'=>$image_name,
            'image_path'=>$image_path,
            'create_at'=>NULL
        ]);
        return redirect()->back()->with("done","Create User Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DB::table("users")->where('id','=',$id)->paginate(10);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = DB::table("users")->where('id','=',$id)->paginate(10);
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = DB::table("users")->where('id','=',$id)->first();
        $image_data = $request->file('image');
        if($image_data == null){
            $image_name = $user->image;
        }
        else{
            $image_name = time(). rand(0,255). rand(0,255). $image_data->getClientOriginalName();
            $image_extension = $image_data->getClientOriginalExtension();
            $location = public_path('upload/');
            $image_data->move($location,$image_name);
            $image_path = public_path('upload/'). $image_name;
        }
        DB::table('users')->where('id', '=' , $id)->update([
            'id'=>NULL,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'nid'=>$request->nid,
            'image'=>$image_name ,
            'image_path'=>$image_path,
            'create_at'=>NULL
        ]);
        return redirect()->route('user.index')->with("done","Update User Data Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = DB::table("users")->where('id','=',$id)->delete();
        return redirect()->route('user.index')->with("done","Delete User Data Successfully");
    }
}
