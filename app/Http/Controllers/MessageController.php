<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messagesData = DB::table("messages")->paginate(5);
        return view('messages.index', compact('messagesData'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('messages')->insert([
            'id'=>NULL,
            'message'=>$request->message,
            'user_id'=>$request->userId,
            'answer'=>$request->answer,
            'create_at'=>NULL
        ]);
        return redirect()->back()->with("done","Create Message Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = DB::table("messages")->where('id','=',$id)->paginate(10);
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $message = DB::table("messages")->where('id','=',$id)->paginate(10);
        return view('messages.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = DB::table("messages")->where('id','=',$id)->first();
        DB::table('messages')->where('id', '=' , $id)->update([
            'id'=>NULL,
            'message'=>$request->message,
            'user_id'=>$request->userId,
            'answer'=>$request->answer,
            'create_at'=>NULL
        ]);
        return redirect()->route('messages.index')->with("done","Update Message Data Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = DB::table("messages")->where('id','=',$id)->delete();
        return redirect()->route('messages.index')->with("done","Delete Property Data Successfully");
    }
}
