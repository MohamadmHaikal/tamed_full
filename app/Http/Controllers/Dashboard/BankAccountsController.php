<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BankAccounts;
use Illuminate\Http\Request;

class BankAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = BankAccounts::where('user_id', '=', get_current_user_id())->get();
        return view('eBills.bank-account', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bank = new BankAccounts;
        $bank->bank_name = $request->bank_name;
        $bank->account_name = $request->account_name;
        $bank->account_number = $request->account_number;
        $bank->iban_number = $request->iban_number;
        $bank->user_id = get_current_user_id();
        $bank->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.bank account added successfully'), 'type' => 'success'])->render(),
            'reload' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return BankAccounts::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bank = BankAccounts::find($id);
        $bank->bank_name = $request->bank_name;
        $bank->account_name = $request->account_name;
        $bank->account_number = $request->account_number;
        $bank->iban_number = $request->iban_number;
        $bank->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.bank account updated successfully'), 'type' => 'success'])->render(),
            'reload' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BankAccounts::find($id)->delete();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.bank account deleted successfully'), 'type' => 'success'])->render(),
            'reload' => true
        ]);
    }
}
