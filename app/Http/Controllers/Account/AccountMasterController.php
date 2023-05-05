<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\StoreAccountMasterRequest;
use App\Http\Requests\UpdateAccountMasterRequest;
use App\Models\Account\AccountMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class AccountMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Account.AccountDashboard', [
            'title'=>'DASHBOARD',
         ]);
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
     * @param  \App\Http\Requests\StoreAccountMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\AccountMaster  $accountMaster
     * @return \Illuminate\Http\Response
     */
    public function show(AccountMaster $accountMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\AccountMaster  $accountMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountMaster $accountMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccountMasterRequest  $request
     * @param  \App\Models\Account\AccountMaster  $accountMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountMasterRequest $request, AccountMaster $accountMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\AccountMaster  $accountMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountMaster $accountMaster)
    {
        //
    }
}
