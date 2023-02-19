<?php

namespace App\Http\Controllers;

use App\Account;
use App\Account_type;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::get();
        return view('accounts.index',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account_types = Account_type::pluck('name','id');
        return view('accounts.create',compact('account_types'));
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
            'date' => 'required|max:255',
            'debit' => 'sometimes|max:255',
            'credit' => 'sometimes|max:255',
            'account_type_id' => 'required|max:255'
        ]);

        $account_type = Account_type::where('id',$request->account_type_id)->first();

        $account = new Account();
        $account->date = $request->date;
        $account->debit = $request->debit;
        $account->credit = $request->credit;
        $account->account_type_id = $request->account_type_id;
        $account->note = $account_type->name;
        $account->user_id = auth()->user()->id;
        $account->save();

        flash('New Bank Add Success.')->success();
        return redirect()->route('accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //$account_types = Account_type::pluck('name','id');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
