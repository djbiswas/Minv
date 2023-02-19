<?php

namespace App\Http\Controllers;

use App\Account;
use App\Product;
use App\Purchase;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::with('product')->get();
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::pluck('name','id');
        $suppliers = Supplier::pluck('name','id');
        return view('purchases.create',compact('products','suppliers'));
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
            'date' => 'required',
            'product_id' => 'required',
            'supplier_id' => 'required',
            'pay' => 'required',
            'unitPrice' => 'sometimes|max:255',
            'sellPrice' => 'sometimes|max:255',
            'quantity' => 'sometimes|max:255',
            'note' => 'sometimes|max:255'

        ]);



        $purchases = new Purchase();
        $purchases->date = $request->date;
        $purchases->product_id = $request->product_id;
        $purchases->supplier_id = $request->supplier_id;
        $purchases->user_id = Auth::user()->id;
        $purchases->quantity = $request->quantity;
        $purchases->unitPrice = $request->unitPrice;
        $totalPrice = $request->quantity * $request->unitPrice;
        $purchases->totalPrice = $totalPrice;
        $purchases->note = $request->note;
        $purchases->save();

        


        $product = Product::find($request->product_id);
        $product->unitPrice = $request->unitPrice;
        $qty = $product->qty;
        $qty = $qty + $request->quantity;
        $product->qty = $qty;
        $product->save();

        $supplier = Supplier::find($request->supplier_id);
        $supplier_old_buy =  $supplier->buy;
        $supplier_old_pay =  $supplier->pay;
        $supplier_old_due =  $supplier->due;

        $supplier->buy = $supplier_old_buy + $totalPrice;
        $supplier->pay = $supplier_old_pay  + $request->pay;
        $supplier->due = $supplier_old_due + $request->due;

        $supplier->save();




        $debit = new Account();
        $debit->date = $request->date;
        $debit->debit = $totalPrice;
        $debit->credit = 0;
        $debit->note = 'Purchase';
        $debit->user_id = auth()->user()->id;

        $debit->save();


        flash('New Purchases Add Success.')->success();

        return redirect()->route('purchases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        $products = Product::pluck('name','id');
        $suppliers = Supplier::pluck('name','id');
        return view('purchases.edit',compact('purchase','products','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $this->validate($request, [
            'date' => 'required',
            'product_id' => 'required',
            'supplier_id' => 'required',
            'unitPrice' => 'sometimes|max:255',
            'sellPrice' => 'sometimes|max:255',
            'quantity' => 'sometimes|max:255',
            'note' => 'sometimes|max:255'

        ]);

        $product = Product::where('id',$purchase->product_id)->first();
        $qty = $product->quantity;
        $qty = $qty - $product->quantity;
        $qty = $qty + $request->quantity;


        $purchases = Purchase::find($purchase->id);
        $purchases->date = $request->date;
        $purchases->product_id = $request->product_id;
        $purchases->supplier_id = $request->supplier_id;
        $purchases->user_id = Auth::user()->id;
        $purchases->quantity = $request->quantity;
        $purchases->unitPrice = $request->unitPrice;
        $totalPrice = $request->quantity * $request->unitPrice;
        $purchases->totalPrice = $totalPrice;
        $purchases->note = $request->note;
        $purchases->save();

        $product = Product::find($purchases->product_id);
        $product->unitPrice = $request->unitPrice;
        $product->qty = $qty;
        $product->save();

        flash('New Purchases Update Success.')->success();

        return redirect()->route('purchases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        return 'deleting';
    }
}
