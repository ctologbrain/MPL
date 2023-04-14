<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerTariffSlabRequest;
use App\Http\Requests\UpdateCustomerTariffSlabRequest;
use App\Models\Account\CustomerTariffSlab;

class CustomerTariffSlabController extends Controller
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
     * @param  \App\Http\Requests\StoreCustomerTariffSlabRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerTariffSlabRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CustomerTariffSlab  $customerTariffSlab
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerTariffSlab $customerTariffSlab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CustomerTariffSlab  $customerTariffSlab
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerTariffSlab $customerTariffSlab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerTariffSlabRequest  $request
     * @param  \App\Models\Account\CustomerTariffSlab  $customerTariffSlab
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerTariffSlabRequest $request, CustomerTariffSlab $customerTariffSlab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CustomerTariffSlab  $customerTariffSlab
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerTariffSlab $customerTariffSlab)
    {
        //
    }
}
