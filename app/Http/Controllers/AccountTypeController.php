<?php

namespace App\Http\Controllers;

use App\Account_type;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account_types = Account_type::get();
        return view('account_types.index',compact('account_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account_types.create');
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
            'crd' => 'sometimes'
        ]);

        $account_type = new Account_type();
        $account_type->name = $request->name;
        $account_type->crd = $request->crd;
        $account_type->save();

        flash('New Account Type Add Success.')->success();
        return redirect()->route('account_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account_type  $account_type
     * @return \Illuminate\Http\Response
     */
    public function show(Account_type $account_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account_type  $account_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Account_type $account_type)
    {
        return view('account_types.edit',compact('account_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account_type  $account_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account_type $account_type)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'crd' => 'sometimes'
        ]);

        $account_type->name = $request->name;
        $account_type->crd = $request->crd;
        $account_type->save();

        flash('New Account Type Add Success.')->success();
        return redirect()->route('account_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account_type  $account_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account_type $account_type)
    {
        //
    }
}
