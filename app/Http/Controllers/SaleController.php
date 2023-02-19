<?php

namespace App\Http\Controllers;

use App\Account;
use App\Customer;
use App\Product;
use App\Sale;
use App\SaleItem;
use App\SalePayment;
use App\Select_customer;
use App\Select_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::get();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $inv = $today . $rand;

        $customers = Select_customer::pluck('name_phone','id');

        return view('sales.create',compact('customers','inv'));
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
            'invoice' => 'required',
            'customer_id' => 'required',
            'date' => 'required',
            'subtotal' => 'required',
            'vat' => 'sometimes',
            'discount' => 'sometimes',
            'netTotal' => 'required',
            'paid' => 'sometimes',
            'due' => 'sometimes',
            'product_id' => 'sometimes',
            'product_name' => 'sometimes',
            'orderQuantity' => 'sometimes',
            'price' => 'sometimes',
            'discount' => 'sometimes',
            'totalPrice' => 'sometimes'
        ]);

        $saleStatus = 'Due';

        if ($request->due == 0){
            $saleStatus = 'Complete';
        }

        $sale = new Sale();
        $sale->invoice = $request->invoice;
        $sale->customer_id = $request->customer_id;
        $sale->user_id = Auth::user()->id;
        $sale->date = $request->date;
        $sale->subtotal = $request->subtotal;
        $sale->vat = $request->vat;
        $sale->discount = $request->discount;
        $sale->netTotal = $request->netTotal;
        $sale->paid = $request->paid;
        $sale->due = $request->due;
        $sale->status = $saleStatus;
        $sale->save();

        $customer = Customer::where('id',$request->customer_id)->first();
        $customer_buy = $customer->buy + $request->netTotal;
        $customer_pay = $customer->pay + $request->paid;
        $customer_due = $customer->due + $request->due;

        $customer_up = Customer::find($request->customer_id);
        $customer_up->buy = $customer_buy;
        $customer_up->pay = $customer_pay;
        $customer_up->due = $customer_due;
        $customer_up->save();

        $payment = new SalePayment();
        $payment->invoice = $request->invoice;
        $payment->date = $request->date;
        $payment->sale_id = $sale->id;
        $payment->customer_id = $request->customer_id;
        $payment->user_id = Auth::user()->id;
        $payment->amount = $request->paid;
        $payment->save();

        for ($i=0; $i <count($request->price) ; $i++) {
            $saleItem = new SaleItem();
            $saleItem->invoice = $request->invoice;
            $saleItem->sale_id = $sale->id;
            $saleItem->product_id = $request->product_id[$i];
            $product_name = Product::where('id',$request->product_id[$i])->first();
            $product_name = $product_name->name;
            $saleItem->product_name = $product_name;
            $saleItem->orderQuantity = $request->orderQuantity[$i];
            $saleItem->discount = $request->discount[$i];
            $saleItem->price = $request->price[$i];
            $saleItem->totalPrice = $request->totalPrice[$i];
            $saleItem->save();

            $product = Product::find($request->product_id[$i]);
            $qty = $product->qty;
            $qty = $qty - $request->orderQuantity[$i];
            $product->qty = $qty;
            $product->save();
        }

        $cradit = new Account();
        $cradit->date = $request->date;
        $cradit->credit = $request->paid;
        $cradit->debit = 0;
        $cradit->note = 'Purchase';
        $cradit->user_id = auth()->user()->id;
        $cradit->save();

        flash('New Sales Add Success.')->success();

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {

        $sale = Sale::where('id',$sale->id)->with('sale_items')->with('sale_payments')->with('customer')->first();
        return view('sales.show',compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $sale = Sale::where('id',$sale->id)->with('sale_items')->with('sale_payments')->first();
        return $sale;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        flash('Sale Delete Success')->success();
        return redirect()->route('sales.index');
    }

    public function addNewRow()
    {
        // $products = Product::pluck('name','id');
        $products = Select_product::pluck('bgp_name','id');
        return view('sales.addNewRow',compact('products'));
    }

    public function single_sell_item(Request $request) {
        $id = $request->id;
        $product = Product::where('id',$id)->first();
        return $product;

    }
}
