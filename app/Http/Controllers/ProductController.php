<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Group;
use App\Product;
use App\Product_type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('brand')->get();

        $total_value = 0;

        // foreach($products as $product){
        //     $total_value = $total_value + ($product->unitPrice * $product->qty );
        // }

        return view('products.index', compact('products', 'total_value'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::pluck('name','id');
        $groups = Group::pluck('name','id');
        $product_types = Product_type::pluck('name','id');

        return view('products.create', compact('brands','groups','product_types'));
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
            'sku' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'group_id' => 'required|max:255',
            'product_type_id' => 'required|max:255',
            'unitPrice' => 'required|max:255',
            'sellPrice' => 'required',
            'note' => 'sometimes'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->brand_id = $request->brand_id;
        $product->group_id = $request->group_id;
        $product->product_type_id = $request->product_type_id;
        $product->user_id = auth()->user()->id;
        $product->unitPrice = $request->unitPrice;
        $product->sellPrice = $request->sellPrice;
        $product->note = $request->note;
        $product->save();
        flash('New Product Add Success.')->success();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::pluck('name','id');
        $groups = Group::pluck('name','id');
        $product_types = Product_type::pluck('name','id');
        return view('products.edit',compact('product','brands','groups','product_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [

            'name' => 'required|max:255',
            'sku' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'group_id' => 'required|max:255',
            'product_type_id' => 'required|max:255',
            'qty' => 'sometimes',
            'unitPrice' => 'required|max:255',
            'sellPrice' => 'required',
            'note' => 'sometimes|max:255'
        ]);

        $product = Product::find($product->id);
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->brand_id = $request->brand_id;
        $product->group_id = $request->group_id;
        $product->product_type_id = $request->product_type_id;
        $product->user_id = auth()->user()->id;
        $product->unitPrice = $request->unitPrice;
        $product->sellPrice = $request->sellPrice;
        $product->note = $request->note;
        $product->save();
        flash('Product Update Success.')->success();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    
    public function product_bulk_update()
    {
        // return view('products.bulk_update',compact('product','brands','groups','product_types'));

        $products = Product::with('brand')->get();

        return view('products.bulk_update');
    }



}
