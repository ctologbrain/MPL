<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMoneyReceiptTransRequest;
use App\Http\Requests\UpdateMoneyReceiptTransRequest;
use App\Models\Account\MoneyReceiptTrans;

class MoneyReceiptTransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreMoneyReceiptTransRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMoneyReceiptTransRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\MoneyReceiptTrans  $moneyReceiptTrans
     * @return \Illuminate\Http\Response
     */
    public function show(MoneyReceiptTrans $moneyReceiptTrans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\MoneyReceiptTrans  $moneyReceiptTrans
     * @return \Illuminate\Http\Response
     */
    public function edit(MoneyReceiptTrans $moneyReceiptTrans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMoneyReceiptTransRequest  $request
     * @param  \App\Models\Account\MoneyReceiptTrans  $moneyReceiptTrans
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMoneyReceiptTransRequest $request, MoneyReceiptTrans $moneyReceiptTrans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\MoneyReceiptTrans  $moneyReceiptTrans
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoneyReceiptTrans $moneyReceiptTrans)
    {
        //
    }
}
