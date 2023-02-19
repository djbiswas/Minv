<?php

namespace App\Http\Controllers;

use App\Customer;
use App\SalePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->note = $request->note;
        $customer->save();
        flash('New Customer Add Success.')->success();
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'sometimes',
            'address' => 'sometimes',
            'note' => 'sometimes'
        ]);

        $customer = Customer::find($customer->id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->note = $request->note;
        $customer->save();
        flash('Customer Update Success.')->success();
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function customer_pay(Request $request){
        $customer = customer::where('id',$request->id)->first();
        $payments = SalePayment::where('customer_id',$request->id)->get();
        return view('customers.pay',compact('customer','payments'));
    }

    public function customer_paid(Request $request) {

        $this->validate($request, [
            'date' => 'required',
            'customer_id' => 'required',
            'pay' => 'required'
        ]);

        $salesPayment = new SalePayment();
        $salesPayment->date = $request->date;
        $salesPayment->customer_id = $request->customer_id;
        $salesPayment->user_id = Auth::user()->id;
        $salesPayment->amount = $request->pay;
        $salesPayment->save();

        $customer_data = Customer::where('id',$request->customer_id)->first();
        $pay = $customer_data->pay + $request->pay;
        $due = $customer_data->due - $request->pay;

        $customer = Customer::find($request->customer_id);
        $customer->pay = $pay;
        $customer->due = $due;
        $customer->save();

        flash('Customers Payment Success.')->success();

        return redirect()->route('customer_reports');

    }
}
