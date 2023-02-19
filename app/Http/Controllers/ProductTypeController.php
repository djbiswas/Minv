<?php

namespace App\Http\Controllers;

use App\Product_type;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_types = Product_type::get();
        return view('product_types.index',compact('product_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'info' => 'sometimes'
        ]);

        $product_type = new Product_type();
        $product_type->name = $request->name;
        $product_type->info = $request->info;
        $product_type->save();

        flash('New Product Type Add Success.')->success();
        return redirect()->route('product_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product_type  $product_type
     * @return \Illuminate\Http\Response
     */
    public function show(Product_type $product_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product_type  $product_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_type $product_type)
    {
        return view('product_types.edit',compact('product_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product_type  $product_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_type $product_type)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'info' => 'sometimes'
        ]);

        $product_type->name = $request->name;
        $product_type->info = $request->info;
        $product_type->save();

        flash('Product Type Update Success.')->success();
        return redirect()->route('product_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product_type  $product_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_type $product_type)
    {
        //
    }
}
