<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agentsData = DB::table("agents")->paginate(5);
        return view('agents.index', compact('agentsData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agents.create');
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
        DB::table('agents')->insert([
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
            'create_at'=>NULL
        ]);
        return redirect()->back()->with("done","Create Agent Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agent = DB::table("agents")->where('id','=',$id)->paginate(10);
        return view('agents.show', compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agent = DB::table("agents")->where('id','=',$id)->paginate(10);
        return view('agents.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $agent = DB::table("agents")->where('id','=',$id)->first();
        $image_data = $request->file('image');
        if($image_data == null){
            $image_name = $agent->image;
        }
        else{
            $image_name = time(). rand(0,255). rand(0,255). $image_data->getClientOriginalName();
            $image_extension = $image_data->getClientOriginalExtension();
            $location = public_path('upload/');
            $image_data->move($location,$image_name);
            $image_path = public_path('upload/'). $image_name;
        }
        DB::table('agents')->where('id', '=' , $id)->update([
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
            'create_at'=>NULL
        ]);
        return redirect()->route('agent.index')->with("done","Update Agent Data Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agent = DB::table("agents")->where('id','=',$id)->delete();
        return redirect()->route('agent.index')->with("done","Delete Agent Data Successfully");
    }
}
