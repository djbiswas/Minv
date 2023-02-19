<?php

namespace App\Http\Controllers;

use App\Account;
use App\Account_type;
use App\Product;
use App\Purchase;
use Illuminate\Http\Request;
use App\Customer;
use App\Sale;
use App\Supplier;
use Yajra\DataTables\DataTables;

class Report extends Controller
{
    public function sales_report() {
        $customers = Customer::pluck('name','id');
        return view('reports.sales_report',compact('customers'));
    }


    public function get_sales_data(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $customer_id = $request->customer_id;

                $query = 'date(date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($customer_id == ''){
                    $sales_date = Sale::whereRaw($query)->with('customer')->get();
                }else {
                    $sales_date = Sale::whereRaw($query)->where('customer_id',$request->customer_id)->with('customer')->get();
                }

            } else {
                $sales_date = Sale::with('customer')->get();
            }
            return DataTables::of($sales_date)->make(true);
        }
    }

    public function purchases_report() {
        $suppliers = Supplier::pluck('name','id');
        return view('reports.purchases_report',compact('suppliers'));

    }

    public function get_purchases_data(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $supplier_id = $request->supplier_id;

                $query = 'date(date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($supplier_id == ''){
                    $purchase_data = Purchase::whereRaw($query)->with('product')->get();
                }else {
                    $purchase_data = Purchase::whereRaw($query)->where('supplier_id',$request->supplier_id)->with('product')->get();
                }

            } else {
                $purchase_data = Purchase::with('product')->get();
            }
            return DataTables::of($purchase_data)->make(true);
        }
    }

    public function stock_report() {
        $products = Product::pluck('name','id');
        return view('reports.stock_report',compact('products'));

    }

    public function get_stock_data(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->product_id)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $product_id = $request->product_id;

                $query = 'date(date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($product_id == ''){
                    $product_data = Product::get();
                }else {
                    $product_data = Product::where('id',$product_id)->get();
                }

            } else {
                $product_data  = Product::get();
            }
            return DataTables::of($product_data)->make(true);
        }
    }


    public function customer_report() {
        return view('reports.customer_report');

    }


    public function customer_reports() {
        $customers = Customer::pluck('name','id');
        return view('reports.customer_report',compact('customers'));

    }


    public function get_customers_data(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->customer_id)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $customer_id = $request->customer_id;

                $query = 'date(date) between "'.$startdate.'" AND "'.$enddate.'"';
                if ($customer_id == '') {
                    $customer_data = Customer::get();
                } else { 
                    $customer_data = Customer::where('id', $customer_id)->get();
                }

            } else {
                 $customer_data = Customer::get();
            }
            return DataTables::of($customer_data)->make(true);
        }
    }

    public function debit_credit() {
        $account_type = Account_type::pluck('name','id');
        return view('reports.debit_credit',compact('account_type'));

    }

    public function get_debit_credit(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $account_type = $request->account_type_id;

                $query = 'date(date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($account_type == ''){
                    $purchase_data = Account::whereRaw($query)->get();
                }else {
                    $purchase_data = Account::whereRaw($query)->where('account_type_id',$request->account_type_id)->get();
                }

            } else {
                $purchase_data = Account::get();
            }
            return DataTables::of($purchase_data)->make(true);
        }
    }

    public function account_month() {
        $account_type = Account_type::pluck('name','id');
        return view('reports.account_month',compact('account_type'));
    }


    public function get_account_month(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $account_type = $request->account_type_id;

                $query = 'date(date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($account_type == ''){
                    $purchase_data = Account::select('note', \DB::raw('SUM(debit) as debit'), \DB::raw('SUM(credit) as credit'), \DB::raw('SUM(credit-debit) as total'))
                        ->whereRaw($query)
                        ->groupBy('note')
                        ->get();
                }else {
                    $purchase_data = Account::select('note', \DB::raw('SUM(debit) as debit'), \DB::raw('SUM(credit) as credit'), \DB::raw('SUM(credit-debit) as total'))
                        ->whereRaw($query)
                        ->groupBy('note')
                        ->where('account_type_id',$request->account_type_id)->get();
                }


            } else {
                $purchase_data = Account::select('note', \DB::raw('SUM(debit) as debit'), \DB::raw('SUM(credit) as credit'), \DB::raw('SUM(credit-debit) as total'))
                                ->groupBy('note')
                                ->get();

            }
            return DataTables::of($purchase_data)->make(true);
        }
    }
}
