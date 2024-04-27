<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordersData = DB::table("orders")->paginate(5);
        return view('orders.index', compact('ordersData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('orders')->insert([
            'id'=>NULL,
            'amount'=>$request->amount,
            'user_id'=>$request->userId,
            'property_id'=>$request->propertyId,
            'create_at'=>NULL
        ]);
        return redirect()->back()->with("done","Create Order Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = DB::table("orders")->where('id','=',$id)->paginate(10);
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = DB::table("orders")->where('id','=',$id)->paginate(10);
        return view('orders.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = DB::table("orders")->where('id','=',$id)->first();
        DB::table('orders')->where('id', '=' , $id)->update([
            'id'=>NULL,
            'amount'=>$request->amount,
            'user_id'=>$request->userId,
            'property_id'=>$request->propertyId,
            'create_at'=>NULL
        ]);
        return redirect()->route('order.index')->with("done","Update Order Data Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = DB::table("orders")->where('id','=',$id)->delete();
        return redirect()->route('order.index')->with("done","Delete Property Data Successfully");
    }
}
