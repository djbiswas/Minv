<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Suppliers_payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::get();
        return view('suppliers.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
            'phone' => 'required|max:255',
            'email' => 'sometimes',
            'address' => 'sometimes',
            'note' => 'sometimes'
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->note = $request->note;
        $supplier->save();
        flash('New Supplier Add Success.')->success();
        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'sometimes',
            'address' => 'sometimes',
            'note' => 'sometimes'
        ]);

        $supplier = Supplier::find($supplier->id);
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->note = $request->note;
        $supplier->save();
        flash('Supplier Update Success.')->success();
        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }


    public function supplier_pay(Request $request){
        $supplier = Supplier::where('id',$request->id)->first();
        return view('suppliers.pay',compact('supplier'));
    }

    public function supplier_paid(Request $request) {

        $this->validate($request, [
            'date' => 'required',
            'supplier_id' => 'required',
            'pay' => 'required'
        ]);

        $supplier_payment = new Suppliers_payment();
        $supplier_payment->date = $request->date;
        $supplier_payment->supplier_id = $request->supplier_id;
        $supplier_payment->user_id = Auth::user()->id;
        $supplier_payment->amount = $request->pay;
        $supplier_payment->save();


        $supplier_data = Supplier::where('id',$request->supplier_id)->first();
        $pay = $supplier_data->pay + $request->pay;
        $due = $supplier_data->due - $request->pay;

        $supplier = Supplier::find($request->supplier_id);
        $supplier->pay = $pay;
        $supplier->due = $due;
        $supplier->save();

        flash('Suppliers Payment Success.')->success();

        return redirect()->route('suppliers.index');

    }
}
