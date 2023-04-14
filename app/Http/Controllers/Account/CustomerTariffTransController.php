<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerTariffTransRequest;
use App\Http\Requests\UpdateCustomerTariffTransRequest;
use App\Models\Account\CustomerTariffTrans;

class CustomerTariffTransController extends Controller
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
     * @param  \App\Http\Requests\StoreCustomerTariffTransRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerTariffTransRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CustomerTariffTrans  $customerTariffTrans
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerTariffTrans $customerTariffTrans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CustomerTariffTrans  $customerTariffTrans
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerTariffTrans $customerTariffTrans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerTariffTransRequest  $request
     * @param  \App\Models\Account\CustomerTariffTrans  $customerTariffTrans
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerTariffTransRequest $request, CustomerTariffTrans $customerTariffTrans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CustomerTariffTrans  $customerTariffTrans
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerTariffTrans $customerTariffTrans)
    {
        //
    }
}
